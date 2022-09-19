    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> --}}
    <script type="text/javascript">
        function btndetails(id) {
            // $.getJSON('/api/cek-detail/'+id,function(data){
            //     $('#detaildata').html('');
            //     console.log(data)
            //     $.each(data,function(x,y){
            //         $('#detaildata').append('<li> Tgl.<em>'+y.created_at+'</em> | <strong>'+y.keterangan+'</strong></li>');
            //     })
            // })
        }
        $(document).ready(function() {
            // $('#btn-detail').click(function(id) {
                // $('#modal-cek-detail').modal('show');
            // })
            $('.slide-page').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                dots: true
            });
        });
    </script>