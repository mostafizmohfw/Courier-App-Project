<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use App\Models\InvoiceItem;

class InvoiceShow extends Component
{
    public $invoice_id;
    public $enableAddItem = false;
    public $name;
    public $quantity;
    public $price;

    public function render()
    {
        $invoice = Invoice::findOrFail($this->invoice_id);
        // dd($invoice);
        return view('livewire.invoice-show',[
            'invoice' => $invoice
        ]);
    }

    public function addNewItem() {
        $this->enableAddItem = !$this->enableAddItem;
    }

    public function saveNewItem() {
        InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id,
        ]);

        $this->name = '';
        $this->price = '';
        $this->quantity = '';

        $this->addNewItem();

        flash()->addSuccess('Added!');

        return redirect(route('invoice-show', $this->invoice_id));
    }
}
