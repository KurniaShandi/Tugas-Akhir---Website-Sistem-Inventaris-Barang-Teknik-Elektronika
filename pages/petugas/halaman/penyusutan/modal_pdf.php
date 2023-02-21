<!-- Modal -->
<div class="modal fade" id="cetakpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="halaman/penyusutan/cetak_pdf.php" method="post" target="_blank">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Dari Tanggal</label>
                                <input type="date" name="dari_tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Sampai Tanggal</label>
                                <input type="date" name="sampai_tanggal" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="cetak_pdf" class="btn btn-primary btn-sm" value="Cetak">
            </div>
            </form>
        </div>
    </div>
</div>