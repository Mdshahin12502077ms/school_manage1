<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">PayMent Way For Registration</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                    $id=session('payment_id');
                    $amount=session('payment_amount');

            ?>

                <div class="d-flex mt-5 mb-5">
                    <div class="row">
                        <div class="mb-3 col-md-6 text-center form-group">
                            <form action="{{ route('bkash-create-payment') }}" method="get">
                                <input type="hidden" name="amount" id="item_amount" value="{{$amount}}">
                                <input type="hidden" name="amountId" id="item_id" value="{{$id}}">
                                <button type="submit" style="border:none">
                                 <img src="{{asset('Backend/image/logo/bkash_logo.png')}}" alt="" class="mx-auto d-block"  style="box-shadow: 10px 5px 5px rgb(128, 108, 108); height:100px;width:70%;">
                                 <h4 class="mt-2">BKASH</h4>
                                </button>
                            </form>

                        </div>

                        <div class="mb-3  col-md-6   form-group">
                            <a href=""><img src="{{asset('Backend/image/logo/Nagad-Logo.wine.png')}}" alt="" class="mx-auto d-block" height="100" width="100" style="box-shadow: 10px 5px 5px rgb(128, 108, 108); height:100px;width:70%;"></a>
                           <h4 class="text-center">Nagad</h4>
                        </div>

                        <div class="mb-3  col-md-6   form-group">
                            <a href=""><img src="{{asset('Backend/image/logo/rocket.png')}}" alt="" class="mx-auto d-block" height="100" width="100" style="box-shadow: 10px 5px 5px rgb(128, 108, 108); height:100px;width:70%;"></a>
                           <h4 class="text-center">Rocket</h4>
                        </div>
                    </div>

                </div>




                <div class="modal-footer">
                    <button type="button" class="footer-btn bg-dark-low"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="footer-btn bg-linkedin"> Fund Save</button>
                </div>
            </form>



        </div>

    </div>
</div>
</div>
