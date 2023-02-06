<div>
    <h2 class="text-center font-bold text-xl">Information</h2>
    <div class="flex items-center gap-4">
        <span class="my-2 font-bold text-xl">Invoice to: </span>
        <p class="italic">{{ $invoice->user->name }}</p>
    </div>

    <table class="table-auto w-full">
        <tr>
            <th class="lms-cell-border text-left">Name</th>
            <th class="lms-cell-border">Price</th>
            <th class="lms-cell-border">Quantity</th>
            <th class="lms-cell-border text-right">Total</th>
        </tr>

        @foreach ($invoice->items as $item)
            <tr>
                <td class="lms-cell-border">{{ $item->name }}</td>
                <td class="lms-cell-border text-center">${{ number_format($item->price, 2) }}</td>
                <td class="lms-cell-border text-center">{{ $item->quantity }}</td>
                <td class="lms-cell-border text-right">${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Subtotal</td>
            <td class="lms-cell-border text-right">${{ number_format($invoice->amount()['total'], 2) }}</td>
        </tr>
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Paid</td>
            <td class="lms-cell-border text-right">- ${{ number_format($invoice->amount()['paid'], 2) }}</td>
        </tr>
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Due</td>
            <td class="lms-cell-border text-right">${{ number_format($invoice->amount()['due'], 2) }}</td>
        </tr>
    </table>

    @if ($enableAddItem)
        <form wire:submit.prevent="saveNewItem">
            <div class="flex my-4">
                <div class="w-full">
                    @include('components.form-field', [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'placeholder' => 'Item name',
                        'required' => 'required',
                    ])
                </div>

                <div class="min-w-max ml-4">
                    @include('components.form-field', [
                        'name' => 'price',
                        'label' => 'Price',
                        'type' => 'number',
                        'placeholder' => 'Type price',
                        'required' => 'required',
                    ])
                </div>

                <div class="min-w-max ml-4">
                    @include('components.form-field', [
                        'name' => 'quantity',
                        'label' => 'Quantity',
                        'type' => 'number',
                        'placeholder' => 'Type quantity',
                        'required' => 'required',
                    ])
                </div>

            </div>
            <div class="flex">
                @include('components.wire-loading-btn')
                <button wire:click="addNewItem" type="button" class="mx-4 lms-btn">Cancel</button>
            </div>
        </form>
    @else
        <button wire:click="addNewItem" class="my-4 lms-btn">Buy New Course</button>
    @endif


    <h3 class="font-bold text-lg my-2">Payments</h3>
    <ul class="mb-4">
        @foreach ($invoice->payments as $payment)
            <li>{{ date('F j, Y - g:i:a', strtotime($payment->created_at)) }} -
                ${{ number_format($payment->amount, 2) }}</li>
        @endforeach
    </ul>

    @if ($invoice->amount()['due'] > 0)
        <h2 class="font-bold mb-2">Add a payment</h2>
        <form method="post" action="{{ route('stripe-payment') }}"> @csrf
            <div class="flex mb-4">
                <div class="w-full">
                    <input value="4242424242424242" name="card_no" type="number" class="lms-input"
                        placeholder="Card number">
                </div>
                <div class="min-w-max ml-4">
                    <input value="12/30" name="card_expiry_date" type="text" class="lms-input"
                        placeholder="Expiry month/year">
                </div>
                <div class="min-w-max ml-4">
                    <input value="232" name="card_ccv" type="text" class="lms-input" placeholder="CCV">
                </div>
                <div class="min-w-max ml-4">
                    <input name="amount" type="number" class="lms-input"
                        value="{{ number_format($invoice->amount()['due'], 2) }}" placeholder="Amount">
                </div>
                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
            </div>
            <button type="submit" class="lms-btn">Pay Now</button>
        </form>
    @endif
</div>
