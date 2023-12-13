<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;

class Products extends BaseController
{
    public function list()
    {
        $produto_model = new ProdutoModel();
        $products = $produto_model->findAll();
    
        $data['products'] = $products;
    
        echo view('templates/header', $data);
        echo view('products/list', $data);
        echo view('templates/footer', $data);
    }

  


public function create()
{
    try {
        $dados = [
            'ProductId' => $this->request->getPost('ProductId'),
            'Name'      => $this->request->getPost('Name'),
            'Quantity'  => $this->request->getPost('Quantity'),
            'Amount'     => $this->request->getPost('Amount'),
        ];

        $produto_model = new ProdutoModel();
        $produto_model->insert($dados);

       
        return redirect()->to('products/list');
    } catch (\Exception $e) {
     
        log_message('error', $e->getMessage());
    
        return redirect()->back()->with('error', 'Error occurred while saving data.');
    }
}
public function edit($productId)
{
    $produto_model = new ProdutoModel();
    $product = $produto_model->find($productId);

    // Pass the product data to the view
    return view('products/edit', ['product' => $product]);
}

// public function update()
// {
//     try {
//         $dados = [
//             'Name'      => $this->request->getPost('Name'),
//             'Quantity'  => $this->request->getPost('Quantity'),
//             'Amount'    => $this->request->getPost('Amount'),
//         ];

//         $productId = $this->request->getPost('ProductId');

//         $produto_model = new ProdutoModel();
       

//         $produto_model->where('ProductId', $productId)->update($dados);

//         return redirect()->to('products/list');
//     } catch (\Exception $e) {
//         log_message('error', $e->getMessage());
//         return redirect()->back()->with('error', 'Error occurred while updating data.');
//     }
// }

// public function update()
// {
//     try {
//         $dados = [
//             'Name'      => $this->request->getPost('Name'),
//             'Quantity'  => $this->request->getPost('Quantity'),
//             'Amount'    => $this->request->getPost('Amount'),
//         ];

//         $productId = $this->request->getPost('ProductId');

//         $produto_model = new ProdutoModel();

//         // Log before the update
//         log_message('debug', 'Before update: ' . print_r($produto_model->find($productId), true));

//         // Add a where clause to identify the product by its primary key
//         $produto_model->where('ProductId', $productId)->update($dados);

//         // Log after the update
//         log_message('debug', 'After update: ' . print_r($produto_model->find($productId), true));

//         return redirect()->to('products/list');
//     } catch (\Exception $e) {
//         log_message('error', $e->getMessage());
//         return redirect()->back()->with('error', 'Error occurred while updating data.');
//     }
// }

public function update($productId)
{
    try {
        $dados = [
            'Name'      => $this->request->getPost('Name'),
            'Quantity'  => $this->request->getPost('Quantity'),
            'Amount'    => $this->request->getPost('Amount'),
        ];

        $produto_model = new ProdutoModel();

      
        $produto_model->where('ProductId', $productId)->update($dados);

        return redirect()->to('products/list');
    } catch (\Exception $e) {
        log_message('error', $e->getMessage());
        return redirect()->back()->with('error', 'Error occurred while updating data.');
    }
}


    public function delete($productId)
    {
        $produto_model = new ProdutoModel();

        // Fetch the product by $productId
        $product = $produto_model->find($productId);

        if ($product === null) {
            // Handle case where the product is not found
            return redirect()->to('products/list')->with('error', 'Product not found.');
        }

        // Perform the deletion of the product from the database
        $produto_model->delete($productId);

        // After successful deletion, redirect to the product list page
        return redirect()->to('products/list')->with('success', 'Product deleted successfully.');
    }

}


