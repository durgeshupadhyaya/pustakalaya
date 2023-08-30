<div class="order-details rounded-4 p-16 p-sm-32 bg-white shadow-2">
    <h3 class="heading--underline h5">Order Details</h3>
    <div class="flex-between mt-24 mt-sm-32">
        <h6>Product</h6>
        <h6>Subtotal</h6>
    </div>
    @if ($cartItems->isNotEmpty())
        @foreach ($cartItems as $item)
            <div class="flex-between mt-12 gap-16">
                <p>
                    {{ $item->name ?? '' }}
                    <span class="fw-medium">x {{ $item->quantity ?? '' }}</span>
                </p>
                @if ($item->price)
                    <p>Rs. {{ number_format($item->price * $item->quantity) }}</p>
                @endif
            </div>
        @endforeach

        @if (session()->has('couponDiscount'))
            <div class="flex-between mt-12">
                <p class="fw-medium">Coupon Discount</p>
                <p class="fw-medium">{{ discount() }}</p>
            </div>
        @endif

        @if ($deliveryCharge > 0)
            <div class="flex-between mt-12">
                <p class="fw-medium">Delivery Charge</p>
                <p class="fw-medium">Rs. {{ $deliveryCharge ?? 0 }}</p>
            </div>
        @endif

        <div class="total flex-center-between mt-24 py-24 border-top border-bottom">
            <h6>Total</h6>
            <div>
                <h6>Rs. {{ number_format(getTotalAmount() + $deliveryCharge, 2) }}</h6>
                <p>Tax inclusive *</p>
            </div>
        </div>
    @endif

    <div class="mt-16">
        <div class="form-check">
            <input class="form-check-input" id="flexRadioDefault2" value="Cash on delivery" type="radio"
                name="payment_method" checked />
            <label class="form-check-label h5" for="flexRadioDefault2">
                Cash on Delivery
            </label>
        </div>
        <div class="form-check mt-16 flex-between">
            <div>
                <input class="form-check-input" id="flexRadioDefault1" value="eSewa" type="radio"
                    name="payment_method" />
                <label class="form-check-label h5" for="flexRadioDefault1">
                    Esewa
                </label>
            </div>

            <img src="{{ asset('frontend/assets/icon/esewa.png') }}" height="20px" width="50px" alt="esewa" />
        </div>

        <div class="form-check mt-16">
            <input class="form-check-input" id="defaultCheck1" type="checkbox" value="" required />
            <label class="form-check-label p fw-medium" for="defaultCheck1">
                I have read and agreed to the website
                <a class="text-danger" href="{{ route('page.show', 'terms-and-conditions') }}" target="_blank">terms
                    and conditions</a>
            </label>
        </div>

        <button class="btn bg-primary100 btn-lg text-white w-100 mt-24">
            Place Order
        </button>
    </div>
</div>
