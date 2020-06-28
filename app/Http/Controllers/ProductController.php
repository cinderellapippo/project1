<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{


    public function show($id)
    {

        $res = DB::table('product')
            ->leftJoin('mark', 'product.product_mark', '=', 'mark.mark_id')
            ->where('product.product_id',$id)
            ->get();

        $data = array();
        $data['name'] =$res[0]->product_name;
        $data['price'] =$res[0]->product_price;
        $data['mark'] = $res[0]->mark_name;
        $data['description'] =$res[0]->product_description;
        $images = $res[0]->product_image!=null?explode(';',$res[0]->product_image):array();
        $data['image'] = array();
        foreach($images as $val){
            $resImage = DB::table('image')->where('image_id',$val)->get();
            $data['image'][]=$resImage[0]->image_name;
        }
        $data['pricepromotion'] = 50;
        $data['livrasion'] = "livrasion";
        $data['garanties'] = "garanties";
        $data['category1'] = 'category1';
        $data['category2'] = 'category2';

        $data['user_num'] = 0;
        $data['user_price'] = 0;

        return view('productsingle', ['data' => $data]);
    }

    public function add($data)
    {

        $res = DB::table('mark')
            ->where('mark.mark_name',$data['product_mark'])
            ->get();
        if(!isset($res[0])){
            $mark_id = DB::table('mark')->insertGetId(
                [ 'mark_name' => 'product_mark' ]
            );
        } else {
            $mark_id = $res[0]->mark_id;
        }

        $images = array();
        foreach(explode(';',$data['product_image']) as $val){
            $resImage = DB::table('image')->where('image_name',$val)->get();
            if(!isset($resImage[0])){
                $images[] = DB::table('image')->insertGetId(
                    [ 'image_name' => $val ]
                );
            } else {
                $images[] = $resImage[0]->image_id;
            }
        }

        DB::table('product')->insert([
            'product_name' => $data['product_name'],
            'product_price' => $data['product_price'],
            'product_mark' => $mark_id,
            'product_description' => $data['product_description'],
            'product_image' => implode(';',$images)
        ]);
    }

    public function update($data)
    {

        $res = DB::table('mark')
            ->where('mark.mark_name',$data['product_mark'])
            ->get();
        if(!isset($res[0])){
            $mark_id = DB::table('mark')->insertGetId(
                [ 'mark_name' => 'product_mark' ]
            );
        } else {
            $mark_id = $res[0]->mark_id;
        }

        $images = array();
        foreach(explode(';',$data['product_image']) as $val){
            $resImage = DB::table('image')->where('image_name',$val)->get();
            if(!isset($resImage[0])){
                $images[] = DB::table('image')->insertGetId(
                    [ 'image_name' => $val ]
                );
            } else {
                $images[] = $resImage[0]->image_id;
            }
        }

        DB::table('product')
            ->where('product_id',$data['product_id'])
            ->update([
                'product_name' => $data['product_name'],
                'product_price' => $data['product_price'],
                'product_mark' => $mark_id,
                'product_description' => $data['product_description'],
                'product_image' => implode(';',$images)
            ]);
    }

    public function delete($id)
    {
        DB::table('product')->where('product_id',$id)->delete();
    }
}
