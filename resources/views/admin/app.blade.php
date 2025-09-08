<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('sweetalert::alert')

  <!-- ======= Header ======= -->
  @include('admin.inc.header')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.inc.sidebar')
<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('pagetitle')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @yield('content')
    </section>

  </main><!-- End #main -->
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


  <script>
    let category = document.querySelector('#id_category');
    category.addEventListener('change', async function(){
        const id_category = this.value; // artinya si selector id_category, mau ambil value
        const selectBooks = document.getElementById('id_books');
        selectBooks.innerHTML = "<option value='' selected disabled>--Pilih Buku--</option>";
        if (!category) {
            selectBooks.innerHTML = "<option value='' selected disabled>--Pilih Buku--</option>";
            return;
        }

        try {
            const res = await fetch(`/get-buku/${id_category}`);
            const data = await res.json();
            data.data.forEach(books => {
                const option = document.createElement('option');
                option.value = books.id;
                option.textContent = books.title;
                selectBooks.appendChild(option);
            });
        } catch (error) {
            console.log('error fetch buku', error);
        }
    });


    document.querySelector('#addRow').addEventListener('click', function(){
        const tbody = document.querySelector('#tableTrans');
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = 1;
        tr.appendChild(td);
    });

</script>

<script>
    let count = 1;
    document.getElementById('addRow').addEventListener('click', function() {
        const tbody = document.querySelector('#tableTrans tbody');
        const selectBook = document.getElementById('id_books');
        const idBook = selectBook.value;
        const Bookname = selectBook.options[selectBook.selectedIndex] ?.text || '';

        if (!idBook) {
            alert ('Pilih buku terlebih dahulu');
            return;
        }

        const no = count++;
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <tr><td>${no}</td></tr>
        <td>${Bookname}<input type="hidden" name="id_buku[]" value="${idBook}"</td>
        <td><button class='btn btn-danger delete-row' type='submit' >Hapus</button></td>`;

        tbody.appendChild(tr);
    });

    document.querySelector('#tableTrans tbody').addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-row')) {
        e.target.closest('tr').remove();

    }
    });


</script>

<script>
    // let count = 0;
    // document.querySelector('#addRow').addEventListener('click', function(){
    //     count++;
    //     const Bookselect = document.querySelector('#id_books').value;
    //     const bukuSelect = document.querySelector('#id_books');
    //     const tbody = document.querySelector('#tableTrans tbody');
    //     const bookName = bukuSelect.options[bukuSelect.selectedIndex]?.text || '' ;
    //     if (!Bookselect) {
    //     alert('Pilih buku terlebih dahulu!');
    //         return;
    //     }
    //     const trNo = document.createElement('tr');
    //     const tdNo = document.createElement('td');
    //     tdNo.textContent = count;

    //     trNo.appendChild(tdNo);

    //     const tdName = document.createElement('td');
    //     tdName.textContent = bookName;
    //     trNo.appendChild(tdName);

    //     const tdAction = document.createElement('td');
    //     const delBtn = document.createElement('button');
    //     delBtn.textContent = 'hapus';
    //     delBtn.className = 'btn btn-danger';
    //     // tdAction.innerHTML = '<button class="btn btn-danger">hapus</button>';
    //     tdAction.appendChild(delBtn);
    //     trNo.appendChild(tdAction);


    //     tbody.appendChild(trNo);
    // });
</script>

  <!-- ======= Footer ======= -->
  @include('admin.inc.footer')
<!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
