<!-- Button trigger modal -->
<button type="button" class="btn btn-minicart position-fixed z-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
  <span class="fs-6 badge-pill b-red text-center d-flex justify-content-center align-items-center p-2 pill-cart text-white" >{{count((array) session('cart'))}}</span>
  <i class="fa-solid  fa-cart-shopping cart-button text-white fs-3 my-auto text-center align-items-center d-flex justify-content-center"></i>
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header b-lemon">
        <h1 class="modal-title fs-5 red text-uppercase" id="exampleModalLabel">{{__('ui.carrello')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body b-lemon">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 col-sm-12 col-12">
                  <div class="dropdown ">
                      
       
                      
                          <div class="row total-header-section">
                              @php $total = 0 @endphp
                              @foreach((array) session('cart') as $id => $details)
                                  @php $total += $details['price'] * $details['quantity'] @endphp
                              @endforeach
                              <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                  <p>Total: <span class=" text-black-50">€ {{ $total }}</span></p>
                              </div>
                          </div>
                          @if(session('cart'))
                              @foreach(session('cart') as $id => $details)
                                  <div class="row cart-detail">
                                      
                                      <div class="col-lg-8 col-sm-8 col-8 cart-detail-product mb-4 cart-divisor">
                                          <p>{{ $details['title'] }}</p>
                                          <span class="price  text-black-50">{{ $details['price'] }} €</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                      </div>
                                  </div>
                              @endforeach
                          @endif
                          <div class="row">
                              
                          </div>
                     
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer b-lemon d-flex justify-content-around">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">{{__('ui.chiudi')}}</button>
        <div class="text-center checkout">
          <a href="{{ route('cart') }}" class="btn  fill b-verde">{{__('ui.visualizza')}}</a>
      </div>
      </div>
    </div>
  </div>
</div>