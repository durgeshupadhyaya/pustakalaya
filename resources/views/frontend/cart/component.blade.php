@if ($cartItems->count() > 0)
    <div class="table table-borderless">
        <table class="mt-32 ">
            <thead class="hidden">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th class="p fw-bold text-center" scope="col">Products</th>
                    <th class="p fw-bold text-center" scope="col">Price</th>
                    <th class="p fw-bold text-center" scope="col">Quantity</th>
                    <th class="p fw-bold text-center" scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr class="d-block d-sm-table-row">
                        <th scope="row">
                            <span class="p-3 h6">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-times text-secondary cursor-pointer cart-item" aria-hidden="true"
                                        cart-item-id="{{ $item->id }}"></i></a>
                            </span>
                        </th>
                        <td style="width: 120px">
                            <div class="img-portrait-02">
                                <img src="{{ asset('admin/images/product/' . $item->attributes->image) }}"
                                    alt="{{ $item->name ?? '' }}" />
                            </div>
                        </td>
                        <td class="text-center align-middle d-flex d-lg-table-cell justify-content-between">
                            <p class="fw-bold d-sm-none">Product:</p>
                            {{ $item->name ?? '' }}
                        </td>
                        <td class="text-center align-middle d-flex d-lg-table-cell justify-content-between">
                            <p class="fw-bold d-sm-none">Price:</p>
                            R.s. {{ number_format($item->price ?? 0) }}
                        </td>
                        <td class="align-middle d-flex d-lg-table-cell justify-content-between">
                            <p class="fw-bold d-sm-none">Quantity:</p>
                            <div class="flex-center-center ">
                                <div class="flex-center-center gap-16 cart-quantity">
                                    <input class="minus btn btn-sm btn-gray btn-decrease" type="button" value="-"
                                        itemquantity="{{ $item->id }}" />
                                    <input class="value text-center btn-md border-0" type="number" min="1"
                                        value="{{ $item->quantity ?? 0 }}" readonly />
                                    <input class="plus btn btn-sm btn-gray btn-increase" type="button" value="+"
                                        itemquantity="{{ $item->id }}" />
                                </div>
                            </div>
                        </td>
                        <td class="text-center align-middle d-flex d-lg-table-cell justify-content-between">
                            <p class="fw-bold d-sm-none">Total:</p>
                            R.s. {{ number_format($item->price * $item->quantity) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="border-top">
                <tr class="text-center d-block d-sm-table-row">
                    <td class="hidden" colspan="4"></td>
                    <td class="fw-medium p ">Subtotal</td>
                    <td class="fw-medium p ">Rs. {{ number_format(Cart::getTotal()) }}</td>
                </tr>

                <tr class="text-center d-block d-sm-table-row">
                    <td class="hidden" colspan="5"></td>
                    <td>
                        <div class="flex-center">
                            <a class="btn mt-8 bg-primary100 text-white" href="{{ route('checkout') }}">CHECKOUT</a>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@else
    <div class="container mt-32">
        <div class="alert alert-secondary text-center m-3" role="alert">
            There's nothing on your cart.
        </div>
    </div>
@endif
