@if(config('services.gtag.id'))
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
</script>
<script src="https://www.googletagmanager.com/gtag/js?id={{ config('services.gtag.id') }}" defer="defer"></script>
@endif
