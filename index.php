<?php
require_once __DIR__.'/vendor/autoload.php';
require_once  __DIR__.'/vendor/bin/generated-conf/config.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Ps\Categories;
use Ps\CategoriesQuery;
use Ps\Products;
use Ps\ProductsQuery;
use Ps\Sales;
use Ps\SalesQuery;
use Ps\SalesBarcodeQuery;

class SyncApp
{

    function __construct()
    {
        $this->url = 'https://omegacloud1.omegaeod.co.il/api/';
        $this->token = '718dbe91-f5ef-4362-9957-0f6791';
    }
    public function GetCategories()
    {
        $ex_items = $this->ajax('IT_SORT');
        print_r($ex_items);
        die();

        foreach ($ex_items as $key => $ex_item)
        {
            $item = CategoriesQuery::create()->findOneByExId($ex_item->TABLEID);
            if (empty($item))
            {
                $item = new Categories();
            }
            $item->setExId($ex_item->TABLEID);
            $item->setCode($ex_item->CODE);
            $item->setTitle($ex_item->DESCR);

            $item->save();
        }
    }
    public function GetSpecialSales()
    {
        $ex_items = $this->ajax('SPECIALSALES');
//        var_dump($ex_items);

        foreach ($ex_items as $key => $ex_item) {
            $item = SalesQuery::create()->findOneByExId($ex_item->TABLEID);
            $item = new Sales();
            $item->setExId($ex_item->SHOP_ID);
            $item->setQuantity($ex_item->QTY);
            $item->setTitle($ex_item->NAME);
            $item->setPrice($ex_item->PRICE);
            $item->setEndDate($ex_item->ENDDATE);
            $item->setRemarks($ex_item->REMARKS);
            $item->setCode($ex_item->CODE);
            $item->setPrice2($ex_item->PRICE2);
            $item->setQuantity2($ex_item->QTY2);
            $item->setPrice3($ex_item->PRICE3);
            $item->setQuantity3($ex_item->QTY3);
            $item->save();
        }

    }
    public function GetSpecialSalesBarcode()
    {
        $ex_items = $this->ajax('SPECIALSALESBARCODE');
        print_r($ex_items);
        die();

        foreach ($ex_items as $key => $ex_item) {
            $item = SalesBarcodeQuery::create()->findOneByExId($ex_item->TABLEID);
            $item = new Sales();
            $item->setExId($ex_item->SHOP_ID);
            $item->setItemCode($ex_item->ITEMCODE);
            $item->setPrice($ex_item->PRICE);
            $item->setCode($ex_item->CODE);

            $item->save();
        }
    }
    private function GetUnitNameByExtId($id, $units) {
        foreach($units as $key => $unit) {
            if($unit->CODE == $id)
                return strtolower($unit->DESC1);
        }
        return null;
    }
    public function GetItems()
    {
        $ex_units = $this->ajax('MIDA');
        $ex_items = $this->ajax('ITEMS?downloadAll=true');

        foreach ($ex_items as $key => $ex_item)
        {
            $items = ProductsQuery::create()->filterByExId($ex_item->IT_CODE)->find();
            $category = CategoriesQuery::create()->findOneByCode($ex_item->ITSORT);
            //var_dump($items->count());
            if (!$items->count()) {
                $item = new Products();
                $item->setUnpublished(1);
                $item->setExId($ex_item->IT_CODE);
                $item->setBarcode($ex_item->BARCODE);
                $item->setPrice($ex_item->PRICE1);
                $item->setPriceMl($ex_item->STANDARTCOST); //For dima
                $item->setTitle($ex_item->IT_DESC);
                if (!empty($category))
                {
                    $item->setCategory($category->getId());
                }
                if($currentUnit = $this->GetUnitNameByExtId($ex_item->MIDA, $ex_units)) {
                    $item->setType($currentUnit);
                    if(!empty($ex_item->QTYPERUNIT)) {
                        $item->setVolume($ex_item->QTYPERUNIT);
                    }
                }
                echo $item->getBarcode()." - new item\n";
                $item->save();
            }
            if ($items->count())
            {
                foreach ($items as $key => $item)
                {
                    $item->setExId($ex_item->IT_CODE);
                    $item->setBarcode($ex_item->BARCODE);
                    $item->setPrice($ex_item->PRICE1);
                    $item->setPriceMl($ex_item->STANDARTCOST); //For dima
                    $item->setTitle($ex_item->IT_DESC);
                    if (!empty($category))
                    {
                        $item->setCategory($category->getId());
                    }
                    if($currentUnit = $this->GetUnitNameByExtId($ex_item->MIDA, $ex_units)) {
                        $item->setType($currentUnit);
                        if(!empty($ex_item->QTYPERUNIT)) {
                            $item->setVolume($ex_item->QTYPERUNIT);
                        }
                    }
                    echo $item->getBarcode()." - existing item\n";
                    $item->save();
                }
            }
        }
        echo 'items updated!!!';
    }
    public function GetUsers()
    {
        $ex_items = $this->ajax('RACT');
        print_r($ex_items);
    }
    function ajax($fun)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.$fun);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Shop-Token: 718dbe91-f5ef-4362-9957-0f6791',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);

        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        //var_dump($result);

        //$res = json_encode(json_decode($result), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //file_put_contents($fun.".json", $res);

        return json_decode($result);

    }
}

$SyncApp = new SyncApp();

$SyncApp->GetSpecialSales();
// $SyncApp->GetCategories();
// $SyncApp->GetItems();
//SyncApp->GetUsers();



?>