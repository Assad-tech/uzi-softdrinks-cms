@extends('frontend.layouts.master')
@section('title', 'Cart')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')

    <div class="cheer">
        <section class="about-sec" data-aos="fade-right" data-aos-offset="400">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="about-content">
                            <h1>Cart</h1>

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <Section class="cart-sec">
            <div class="cart block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                            <table class="cart__table cart-table">
                                <thead class="cart-table__head">
                                    <tr class="cart-table__row">
                                        <th class="cart-table__column cart-table__column--image">Image</th>
                                        <th class="cart-table__column cart-table__column--product">Product</th>
                                        <th class="cart-table__column cart-table__column--price">Price</th>
                                        <th class="cart-table__column cart-table__column--quantity">Quantity
                                        </th>
                                        <th class="cart-table__column cart-table__column--total">Total</th>
                                        <th class="cart-table__column cart-table__column--remove"></th>
                                    </tr>
                                </thead>
                                <tbody class="cart-table__body">
                                    <tr class="cart-table__row">
                                        <td class="cart-table__column cart-table__column--image">
                                            <div class="product-image"><a href="#" class="product-image__body"><img
                                                        class="product-image__img" src="assets/images/explore-item1.png"
                                                        alt=""></a></div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--product"><a href="#"
                                                class="cart-table__product-name">Lorem Ipsum</a>
                                            <ul class="cart-table__options">
                                                <li>Color: Yellow</li>
                                                <!-- <li>Material: Aluminium</li> -->
                                            </ul>
                                        </td>
                                        <td class="cart-table__column cart-table__column--price" data-title="Price">$699.00
                                        </td>
                                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                            <div class="input-number"><input class="form-control input-number__input"
                                                    type="number" min="1" value="2">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--total" data-title="Total">
                                            $1,398.00</td>
                                        <td class="cart-table__column cart-table__column--remove"><button type="button"
                                                class="btn btn-light btn-sm btn-svg-icon"><svg width="12px"
                                                    height="12px">
                                                    <use xlink:href="images/sprite.svg#cross-12">
                                                    </use>
                                                </svg></button></td>
                                    </tr>
                                    <tr class="cart-table__row">
                                        <td class="cart-table__column cart-table__column--image">
                                            <div class="product-image"><a href="#" class="product-image__body"><img
                                                        class="product-image__img" src="assets/images/explore-item2.png"
                                                        alt=""></a></div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--product"><a href="#"
                                                class="cart-table__product-name">Lorem Ipsum</a></td>
                                        <td class="cart-table__column cart-table__column--price" data-title="Price">$849.00
                                        </td>
                                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                            <div class="input-number"><input class="form-control input-number__input"
                                                    type="number" min="1" value="1">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--total" data-title="Total">$849.00
                                        </td>
                                        <td class="cart-table__column cart-table__column--remove"><button type="button"
                                                class="btn btn-light btn-sm btn-svg-icon"><svg width="12px"
                                                    height="12px">
                                                    <use xlink:href="images/sprite.svg#cross-12">
                                                    </use>
                                                </svg></button></td>
                                    </tr>
                                    <tr class="cart-table__row">
                                        <td class="cart-table__column cart-table__column--image">
                                            <div class="product-image"><a href="#" class="product-image__body"><img
                                                        class="product-image__img" src="assets/images/explore-item3.png"
                                                        alt=""></a></div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--product"><a href="#"
                                                class="cart-table__product-name">lorem Ipsum</a>
                                            <ul class="cart-table__options">
                                                <li>Color: True Red</li>
                                            </ul>
                                        </td>
                                        <td class="cart-table__column cart-table__column--price" data-title="Price">
                                            $1,210.00</td>
                                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                            <div class="input-number"><input class="form-control input-number__input"
                                                    type="number" min="1" value="3">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--total" data-title="Total">
                                            $3,630.00</td>
                                        <td class="cart-table__column cart-table__column--remove"><button type="button"
                                                class="btn btn-light btn-sm btn-svg-icon"><svg width="12px"
                                                    height="12px">
                                                    <use xlink:href="images/sprite.svg#cross-12">
                                                    </use>
                                                </svg></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart__actions">
                                <form class="cart__coupon-form"><label for="input-coupon-code"
                                        class="sr-only">Password</label> <input type="text" class="form-control"
                                        id="input-coupon-code" placeholder="Coupon Code"> <button type="submit"
                                        class="btn btn-primary">Apply Coupon</button></form>
                                <div class="cart__buttons"><a href="index.html" class="btn btn-light">Continue
                                        Shopping</a> <a href="#" class="btn btn-primary cart__update-button">Update
                                        Cart</a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Cart Totals</h3>
                                    <table class="cart__totals">
                                        <thead class="cart__totals-header">
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>$5,877.00</td>
                                            </tr>
                                        </thead>
                                        <tbody class="cart__totals-body">
                                            <tr>
                                                <th>Shipping</th>
                                                <td>$25.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tax</th>
                                                <td>$0.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="cart__totals-footer">
                                            <tr>
                                                <th>Total</th>
                                                <td>$5,902.00</td>
                                            </tr>
                                        </tfoot>
                                    </table><a class="btn btn-primary btn-xl btn-block cart__checkout-button"
                                        href="checkout.php">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </Section>
        <section class="inner-footer">
        </section>
    </div>

@endsection
@section('footer')
    @include('frontend.partials.footer')
@endsection
@push('custom_js')
@endpush
