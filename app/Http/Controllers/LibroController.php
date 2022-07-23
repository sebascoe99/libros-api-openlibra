<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$urlProducto = env('URL_PRODUCTO_MAGENTO');
        $requestUrl = "https://www.etnassoft.com/api/v1/get/?criteria=most_viewed";
        $headers = array(
            'Content-Type: application/json',
            //'Authorization: Bearer '.$token
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER=> false,
            CURLOPT_HTTPHEADER => $headers

        ));

        $response = curl_exec( $curl);
        curl_close( $curl );

        $libros = json_decode($response, TRUE);
        $categorias = $this->getCategories();

        return View::make('welcome')->with('libros', $libros)->with('categorias', $categorias);
    }

    public function getCategories(){

        $requestUrl = "https://www.etnassoft.com/api/v1/get/?get_categories=all";
        $headers = array(
            'Content-Type: application/json',
            //'Authorization: Bearer '.$token
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER=> false,
            CURLOPT_HTTPHEADER => $headers

        ));

        $response = curl_exec( $curl);
        curl_close( $curl );

        return $categorias = json_decode($response, TRUE);
    }

    public function findBooksByIdCategorie(Request $request){
        //return $request->id_categoria;

        //$urlProducto = env('URL_PRODUCTO_MAGENTO');
        $requestUrl = "https://www.etnassoft.com/api/v1/get/?category_id="."$request->id_categoria";
        $headers = array(
            'Content-Type: application/json',
            //'Authorization: Bearer '.$token
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER=> false,
            CURLOPT_HTTPHEADER => $headers

        ));

        $response = curl_exec( $curl);
        curl_close( $curl );

        $libros = json_decode($response, TRUE);
        $categorias = $this->getCategories();

        return View::make('welcome')->with('libros', $libros)->with('categorias', $categorias)->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
