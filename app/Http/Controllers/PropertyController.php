<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Property;

class PropertyController extends Controller
{
    public function index()
    {
        //$properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        return view('property.index')->with('properties', $properties);
    }


    //Mostrar detalhes do Imovel com mais detalhes
    public function show($name)
    {

        //$property = DB::select("SELECT * FROM properties WHERE name = ?", [$name]);

        $property = Property::where('name', $name)->get();

        if(!empty($property)){

            return view('property.show')->with('property', $property);

        }else{
            return redirect()->action('PropertyController@index');
        }

    }

    // Manda para a Página de Cadastro de Novo Produto
    public function create()
    {
        return view('property.create');
    }


    // Retorna toda a listagem de produto com os campos em seus devidos lugares
    public function store(Request $request)
    {
        $propertySlug = $this->setName($request->title);

       /*  $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];


        DB::insert("INSERT INTO properties (title, name, description, rental_price, sale_price) VALUES
                    (?, ?, ?, ?, ?)", $property); */

        $property = [
            'title'=> $request->title,
            'name'=> $propertySlug,
            'description'=> $request->description,
            'rental_price'=>$request-> rental_price,
            'sale_price'=>$request-> sale_price
        ];
        Property::create($property);
        return redirect()->action('PropertyController@index');
    }


    //Metodo para Editar o Imovel Cadastrado
    public function edit($name)
    {
        //Se Consegue resgatar pelo menos uma propriedade do meu banco de dados

        /* $property = DB::select("SELECT * FROM properties WHERE name = ?", [$name]); */
        $property = Property::where('name', $name)->get();

        if(!empty($property)){
            //se sucesso retorna uma view
            return view('property.edit')->with('property', $property);

        }else{
            //caso falhe ira retornar para o metodo de listagem
            return redirect()->action('PropertyController@index');
        }

    }


    //Editar ou Atualizar o Registro Cadastrado
    public function update(Request $request, $id)
    {

        $propertySlug = $this->setName($request->title);
/*
        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $id
        ];

        DB::update(" UPDATE properties SET title = ?, name = ?, description = ?, rental_price = ?, sale_price = ?
                    WHERE id = ?", $property); */

        $property = Property::find($id);

        $property->title = $request->title;
        $property->name = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->action('PropertyController@index');
    }


    //Remover Imovel cadastrado
    public function destroy($name)
    {
        /* $property = DB::select("SELECT * FROM properties WHERE name = ?", [$name]); */
        $property = Property::where('name', $name)->get();

        if(!empty($property))
        {
            $property = DB::delete('DELETE FROM properties WHERE name = ?', [$name]);
        }
        return redirect()->action('PropertyController@index');
    }



    //Faz a limpeza dos dados para introduzir no banco de dados
    private function setName($title)
    {

        $propertySlug = str_slug($title);

        //$properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        $t = 0;

        foreach($properties as $property){
            if(str_slug($property->title)===$propertySlug){
                $t++;
            }
        }
        if($t>0){
            $propertySlug = $propertySlug . '-' . $t;
        }
        return $propertySlug;
    }
}
