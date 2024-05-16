@extends('layouts.app')
@section('css')
    <style>
        .img-product {
            max-width: 50px;
        }
    </style>
@endsection
@section('content')
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800">Keranjang </h1>

    <hr class="sidebar-divider">

      @if ($message = Session::get('error'))
                         <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                             <strong> {{ $message }} </strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

    <input type="hidden" id="keranjang" value="{{ json_encode($keranjang) }}">
    <form action="{{ route('member.keranjang.pemesanan') }}" method="POST">
        @csrf
        <div class="card mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama</th>
                                <th class="text-center">Tersedia</th>
                                <th class="text-right">Harga</th>
                                <th>Satuan</th>
                                <th>Jumlah Pesanan</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($keranjang as $index => $data)
                                <tr>
                                    <th>


                                        <button type="button" data-toggle="modal" data-target="#deleteModal"
                                            data-lock="{{ $data->id }}"
                                            class="btn btn-sm btn-danger btn-icon-split p-0">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text"> {{ $loop->iteration }}</span>
                                        </button>

                                    </th>
                                    <td class="d-flex">
                                        <input type="hidden" name="product_id[{{ $index }}]" value="{{ $data->products->id }}">
                                        <img src="{{ $data->products->gambar }}" alt="{{ $data->products->nama }}"
                                            class="img-product img-thumbnail">
                                        <a href="{{ route('guest.product.show', $data->products->id) }}" target="_blank"
                                            class="nav-link">{{ $data->products->nama }}</a>
                                    </td>
                                    <td class="text-center"> {{ $data->products->stok }}</td>
                                    <td class="text-right font-weight-bold"> Rp.{{ $data->products->hargaRp }}</td>
                                    <td> {{ $data->products->satuan }}</td>
                                    <td>
                                        <input type="number" oninput="hitungSubtotal({{ $index }})"
                                            class="form-control jumlah @error('jumlah.' . $index) is-invalid @enderror" required style="max-width: 100px" name="jumlah[{{ $index }}]"
                                            value="{{ old('jumlah.' . $index, 1) }}"  data-index="{{ $index }}">
                                             @error('jumlah.' . $index  )
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </td>
                                    <td>
                                        <div class="subtotal" id="subtotal{{ $index }}">
                                            Rp.{{ $data->products->hargaRp }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-danger">
                                        There are no data.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr class="bg-dark text-white">
                                <th colspan="6" class="text-right">Grand Total</th>
                                <th>
                                    <div id="grandTotal">Rp.0</div>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>

        @if ($keranjang->count() != 0)
            <div class="card h-100 border-start-lg border-start-success mb-4">
                <div class="card-body ">



                    <div class="small text-muted">Pesan Sekarang,</div>
                    <div class="h3 d-flex align-items-center">Tertarik Dengan Produk Kami</div>


                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="text">Buat Pesanan Sekarang</span>
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </button>

                </div>
            </div>
        @endif
    </form>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3 id="cek"> Hapus Data? </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Iya. Hapus!</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#deleteModal').on('shown.bs.modal', function(event) {
                xLock = event.relatedTarget.getAttribute('data-lock');
                document.getElementById('deleteModal').querySelector('form').action =
                    "{{ route('member.keranjang.destroy', ':data') }}".replace(':data', xLock);
            })



        });

        function formatRibuan(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        const keranjang = JSON.parse(document.getElementById('keranjang').value);
        const jumlahInputs = document.querySelectorAll('.jumlah');
        const subtotalElements = document.querySelectorAll('.subtotal');
        let grandTotal = 0;


        function hitungSubtotal(index) {
            const harga = parseFloat(keranjang[index].products.harga);
            const jumlah = parseFloat(jumlahInputs[index].value);
            const subtotal = isNaN(harga * jumlah) ? 0 : harga * jumlah;
            document.getElementById('subtotal' + index).textContent = `Rp.${formatRibuan(subtotal)}`;
            return subtotal;
        }

        function hitungGrandTotal() {
            let total = 0;
            subtotalElements.forEach((subtotalElement, index) => {
                total += parseFloat(subtotalElement.textContent.split('Rp.')[1].replace(/\./g, ''));
            });
            grandTotal = isNaN(total) ? 0 : total;
            document.getElementById('grandTotal').textContent = `Rp.${formatRibuan(grandTotal)}`;
        }

        jumlahInputs.forEach(input => {
            input.addEventListener('input', () => {
                const index = input.getAttribute('data-index');
                hitungSubtotal(index);
                hitungGrandTotal();
            });
        });

        hitungGrandTotal();
    </script>
@endsection
