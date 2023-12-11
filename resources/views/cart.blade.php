<x-layout >
    
        
    <div class="container marginee ">
        <h1 class="col-12 text-center carrello text-uppercase"> {{__('ui.Il_tuo_carrello')}} </h1>
        <div class="row">
            <div class="col-12">
                <table id="cart" class="table table-hover table-condensed  ">
                    <thead class=" bg-transparent">
                        <tr class=" bg-transparent">
                            <th class=" bg-transparent" style="width:50%">{{__('ui.prodotti')}}</th>
                            <th class=" bg-transparent" style="width:10%">{{__('ui.prezzo')}}</th>
                            <th class=" bg-transparent" style="width:8%">{{__('ui.quantità')}}</th>
                            <th class=" bg-transparent text-center" style="width:22%" >{{__('ui.totale')}}</th>
                            <th class=" bg-transparent" style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody class="  bg-transparent">
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr class=" bg-transparent" data-id="{{ $id }}">
                                    <td data-th="Product" class=" bg-transparent">
                                        <div class="row  bg-transparent">
                                            
                                            
                                            <div class="col-sm-9">
                                                <h4 class="m-0 text-uppercase">{{ $details['title'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" bg-transparent" data-th="Price">€{{ $details['price'] }}</td>
                                    <td data-th="Quantity" class=" bg-transparent">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center  bg-transparent">€{{ $details['price'] * $details['quantity'] }}</td>
                                    <td class="actions  bg-transparent" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> {{ __('ui.elimina')}}</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right  bg-transparent"><h3><strong>{{__('ui.totale')}} €{{ $total }}</strong></h3></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right  bg-transparent">
                                <a href="{{ route('index') }}" class="btn btn fill b-verde"> <i class="fa fa-arrow-left"></i>{{__('ui.continua_shopping')}}</a>
                                
                                
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
 

 
    
    


   

<script >
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Sei sicuro di voler rimuovre l' articolo?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>

</x-layout>