<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        //verificar se existe seção para os produtos
        if(session()->has('cart')) {
            $products = session()->get('cart');
            $productsSlugs = array_column($products, 'slug');

            if(in_array($product['slug'], $productsSlugs)) { //se dentro da seção já existir um produto que estou enviando novamente

                $products = $this->productIncrement($product['slug'], $product['amount'], $products);

                session()->put('cart', $products);

            } else {
                //existindo eu adiciono este produto na seção existente
                session()->push('cart', $product);
            }
        } else {
            // nao existindo eu crio esta sessao com o primeiro produto
            $products[] = $product;

            session()->put('cart', $products);
        }

        flash('Produto adicionado no carrinho')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);


    }

    public function remove($slug)
    {
        if(!session()->has('cart'))
            return redirect()->route('cart.index');

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug; //filtrando os produtos q nao sejam iguais ao slug da url
        });

        session()->put('cart', $products);
        flash('Produto removido do carrinho')->warning();
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');

        flash('Compra cancelada com sucesso')->warning();
        return redirect()->route('cart.index');
    }

    private function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function($line) use($slug, $amount){
            if($slug == $line['slug']) {
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}
