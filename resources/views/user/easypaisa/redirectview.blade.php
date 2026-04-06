<form method="POST" action="https://easypay.easypaisa.com.pk/easypay/Index.jsf">

@foreach($data as $key => $value)
<input type="hidden" name="{{ $key }}" value="{{ $value }}">
@endforeach

<button type="submit">Pay Now</button>

</form>

<script>
document.forms[0].submit();
</script>
