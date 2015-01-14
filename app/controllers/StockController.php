<?php

class StockController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//take xmls

		$xml_url = "http://www.matba.com.ar/xml/ajustes.xml";
		$xml = simplexml_load_file($xml_url);


		return View::make('stock.index')->with('items',$xml->Ajustes);;

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		// create database with xml information

		$xml_url = "http://www.matba.com.ar/xml/ajustes.xml";
		$xml = simplexml_load_file($xml_url);


		foreach ($xml->Ajustes as $item)
		{
			$stock = new Stock();
			$stock->POSICION    = $item->PRODUCTO.' '.$item->PUERTO_ABREVIADO.' '.$item->ENTREGA  ;
			$stock->ANTERIOR    = $item->PRECIO_AJUSTE_ANTERIOR;
			$stock->APERTURA    = $item->PRIMER_OPERADO;
			$stock->BAJO        = $item->MINIMO_OPERADO;
			$stock->ALTO        = $item->MAXIMO_OPERADO;
			$stock->ULTIMO      = $item->ULTIMO_OPERADO;
			$stock->CIERRE      = $item->PRECIO_AJUSTE;
			$stock->VARIACION   = $item->Dif;
			$stock->VOLUMEN     = $item->VOLUMEN;
			$stock->VOLUMENIN   = $item->VOLINTONS;
			$stock->OI          = $item->OI;
			$stock->UNIDAD      = $item->DESCUNIDAD;
			$stock->MONEDA      = $item->MONEDA;
			$stock->save();
		}


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
