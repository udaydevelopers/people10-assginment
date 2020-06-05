@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Create Invoice</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="inventory_form" method="post">
                        @csrf
                    <span id="result"></span>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Address</label>
                        <textarea class="form-control" name="address" id="formGroupExampleInput2" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Due Date</label>
                        <input type="text" name="due_date" class="form-control" id="formGroupExampleInput3" placeholder="Due Date">
                    </div>
                    <div class="">
                
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                    <div class="row">
                    <div class="col-md-3">
                            <div class="form-group change text-primary">
                                <label for="">Grand Total</label>
                                :Amt<span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" name="save" id="save" value="Save"> 
                        </div>
            
                    </div>
                    </form>
                </div>
         
                
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   var count = 1;
   dynamic_field(count);
   function dynamic_field(number)
   {
        var html = '<tr>';
        html += '<td><input type="text" name="description[]" class="form-control"></td>';
        html += '<td><input type="text" name="unit_price[]" class="form-control"></td>';
        html += '<td><input type="text" name="quantity[]" class="form-control"></td>';
        html += '<td><input type="text" name="sub_total[]" class="form-control"></td>';
        if(number > 1)
        {
            html +='<td><button name="remove" id="remove" class="btn btn-danger">Remove</button></td></tr>';
            $("tbody").append(html);
        }else{
            html +='<td><button name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $("tbody").append(html);
        }
   }

   $("#add").click(function(event){
       event.preventDefault();
       count++;
       dynamic_field(count);
   });
   $(document).on('click', '#remove', function(event){
       event.preventDefault();
       count--; 
       dynamic_field(count);
   });

   $("#inventory_form").on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url:'{{ route("invoices.store") }}',
        method:'post',
        data:$(this).serialize(),
        dataType:'Json',
        beforeSend:function(){
            $("#save").attr('disabled','disabled');
        },
        success:function(data){
            if(data.error)
            {
                var error_html = '';
                for(count=0; count < data.error.length; count++)
                {
                    error_html = '<p>'+ data.error[count] +'</p>';
                }
                $('#result').html('<div class="alert alert-danger'> + error_html + '</div>');
            }else{
                dynamic_field(1);
                $('#result').html('<div class="alert alert-success'> + data.success + '</div>');
            }
            $("#save").attr('disabled',false);
        }
    });
   });
    
    // update_amounts();
    // $('.qty').change(function() {
    //     update_amounts();
    // });

    // function update_amounts()
    // {
    //     var sum = 0.0;
    //     $('.after-add-more .row').each(function() {
    //         var qty = parseFloat($(this).find('.qty').val() || 0,10);
    //         var price = parseFloat($(this).find('.price').val() || 0,10);
    //         var amount = (qty*price)
    //         sum+=amount;
    //         $(this).find('.sub_total_amt').val(''+amount);
    //     }); console.log(sum);
    //     //just update the total to sum  
    //     $('input.total').val(sum);
    // }
});
</script>
@endpush