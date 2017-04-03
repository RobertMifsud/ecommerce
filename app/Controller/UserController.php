<?php
namespace App\Controller;

use App\Repository\MongoDB;
use MongoDB\BSON\ObjectID;
use App\Controller\ProductController;

class UserController extends BaseController implements ControllerInterface
{
    // key used to encrypt - decrypt
    private $key = "flamingo99";

    /**
     * AuthenticationController constructor.
     */
    public function __construct()
    {
        $this->repository = new MongoDB("users");
    }

    /**
     * @param $_id
     * @return string
     */
    public function getOrder($_id)
    {
        return json_encode($this->repository->get(["orders._id" => new ObjectID($_id)], null, ['orders.$' => true]));
    }

    /**
     * Register
     */
    public function register()
    {
        $data = $_POST;
        $data['password'] = hash_hmac("sha512", $data['password'], $this->key);

        $username_exists = $this->repository->get(["username" => $data['username']]);
        $data['is_admin'] = false;

        if (empty($username_exists)) {
            $user = $this->repository->create($data);

            if ($user->getInsertedCount() > 0) {
                return json_encode(["status" => "success", "user" => $this->repository->get(["_id" => $user->getInsertedId()])[0]]);
            }
        }

        return json_encode(["status" => "fail", "user" => ""]);
    }

    public function shipOrder($orderId) {
        return json_encode($this->repository->update(["orders._id" => new ObjectID($orderId)], ['$set' => ["orders.$.status" => "shipped"]]));
    }

    /**
     * Login
     */
    public function login()
    {
        $data = $_POST;
        $data['password'] = hash_hmac("sha512", $data['password'], $this->key);

        $user = $this->repository->get(["username" => $data['username'], "password" => $data['password']]);

        if (!empty($user)) {
            return json_encode(["status" => "success", "user" => $user[0]]);
        } else {
            return json_encode(["status" => "fail", "user" => ""]);
        }
    }

    /**
     * @return string
     */
    public function createUserOrder()
    {
        $data = $_POST;

        $order = [];

        $order["_id"] = new ObjectID();
        $order["products"] = $data['products'];
        $order["date"] = new \DateTime('now');

        for ($i=0; $i < count($order["products"]); $i++) {
            $order["products"][$i]["_id"] = new ObjectID($order["products"][$i]["_id"]);
        }

        $order["shipping_method"] = new ObjectId($data["shipping_method"]);
        $order["status"] = "pending";

        $orderAdded = $this->repository->update(["username" => $data["username"]], ['$push' => ["orders" => $order]]);

        if ($orderAdded->getModifiedCount() == 1) {
            return json_encode(["status" => "success"]);
        } else {
            return json_encode(["status" => "fail"]);
        }
    }

    /**
     * @return string
     */
    public function logUserView()
    {
        $data = json_decode($_POST["json"]);

        $trackingExists = $this->repository->get(["_id" => new ObjectID($data->user_id),
                                                  "tracking.product_id" => new ObjectId($data->product_id)]);

        if (!empty($trackingExists)) {
            $trackingUpdate = $this->repository->update(["_id" => new ObjectId($data->user_id), "tracking.product_id" => new ObjectId($data->product_id)],
                ['$inc' => [
                    "tracking.$.views" => 1
                ]]);
        } else {
            $trackingUpdate = $this->repository->update([
                "_id" => new ObjectId($data->user_id)],
                [
                    '$push' => [
                            "tracking" => [
                                "product_id" => new ObjectId($data->product_id),
                                "views" => 1
                            ]
                        ]
                ]);
        }

        if ($trackingUpdate->getModifiedCount() == 1) {
            return json_encode(["status" => "success"]);
        } else {
            return json_encode(["status" => "fail"]);
        }
    }

    /**
     * @param string $_id
     * @return string
     */
    public function getRecommendedProducts(string $_id) {
        $user = $this->repository->get(["_id" => new ObjectID($_id)])[0];

        if (!empty($user["tracking"])) {
            $products = [];

            foreach ($user["tracking"] as $key => $tracking) {
                $products[] = $tracking;
            }

            $compare = function ($a, $b) {
                if ($a["views"] == $b["views"]) {
                    return 0;
                }

                return ($a["views"] < $b["views"]) ? 1 : -1;
            };

            usort($products, $compare);

            $products = array_slice($products, 0, 10, true);
            $data = [];

            foreach ($products as $product) {
                $productsController = new ProductController();
                $data[] = json_decode($productsController->read($product->product_id))[0];
            }

            return json_encode($data);
        }

        return json_encode([]);
    }
}