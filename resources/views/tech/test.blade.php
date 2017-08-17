@foreach($a as $a1)
<tr>
    <td>1 </td>
    <td>2</td>
    <td>
        <button type="button" class="btn btn-danger" data-id="{{ $a1->business_layer_id}}"">Delete</button>
    </td>
</tr>
@endforeach

<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>



</script>
