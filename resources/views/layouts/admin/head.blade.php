<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ url('/') }}/assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/css/lib/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/') }}/assets/css/lib/helper.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://code.iconify.design/1/1.0.5/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="{{url('/assets/css/customFormStyle.css')}}">
    {{-- <style>
        .customDashboardForm .card-header {
            background-color: #42A5F5;
            letter-spacing: 1px;
            color: #f5f5f5;
        }

        .customDashboardForm .card {
            padding-top: 0;
            padding-left: 0;
            padding-right: 0;
            background-color: #eae3e3;
            border-bottom : 2px solid black;
        }

        .customDashboardForm .card form row div {
            padding: 0;

        }

        .customDashboardForm .form-group {
            margin-bottom: 0;
        }

        .customDashboardForm label {
            padding-left: 2px;
            margin-bottom: 1px;
            /* color: #757575; */
            color: black;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .customDashboardForm button[type=submit] {
            cursor: pointer;
            background-color: #0288d1;
        }

        .customDashboardForm input,
        .customDashboardForm select {
            border: 2px solid gray;
        }

        .customDashboardForm input:hover,
        .customDashboardForm select:hover {
            border: 2px solid gray ;
        }
        .customAlert .alert-danger {
            background-color: #FFCDD2;
        }

        .customAlert .alert-success {
            background-color: #E8F5E9
        }

        .customAlert>div {
            margin-bottom: 0;
        }

    </style> --}}
    @stack('customStyle')
</head>
