@extends('admin')
@section('content')

	<section class="wrapper">
        <div id="donut-example" class="morris-donut-inverse"></div>
    </section>
    <script>

var colorDanger = "#FF1744";
Morris.Donut({
  element: 'donut-example',
  resize: true,
  colors: [
    '#E0F7FA',
    '#B2EBF2',
    'Green',
    '#4DD0E1',
    '#26C6DA',
    '#00BCD4',
    '#00ACC1',
    '#0097A7',
    '#00838F',
    '#006064'
  ],
  //labelColor:"#cccccc", // text color
  //backgroundColor: '#333333', // border color
  data: [
    {label:"Đá", value:123, color:colorDanger},
    {label:"gạch", value:369},
    {label:"Máy", value:246},
    {label:"Dụng cụ", value:159},
    {label:"Sắt", value:357}
  ]
});
    </script>
                @endsection
