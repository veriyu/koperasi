<div class="x_panel">
  <div class="x_content">
    <div class="row">
      <div class="form-group">
        <div class=" col-xs-12">
          <div><h5>Angsuran</h5></div>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" valign="center" rowspan="2" style="width: 150px">Tanggal</th>
                <th class="text-center" valign="center" rowspan="2" >Keterangan</th>
                <th class="text-center" valign="center" rowspan="2" style="width: 125px">Debit</th>
                <th class="text-center" valign="center" rowspan="2" style="width: 125px">Kredit</th>
                <th class="text-center" valign="center" colspan="2" >Saldo</th>
              </tr>
              <tr>
                <th class="text-center" style="width: 125px">Debit</th>
                <th class="text-center" style="width: 125px">Kredit</th>
              </tr>
            </thead>
            <tbody>
              @if(empty($DataLaporan))
                <tr>
                  <td colspan="7" class="text-center" style="color: red;">Tidak Ada Data Untuk Tanggal {{ $awal }} s/d {{ $akhir }}</td>
                </tr>
              @else
                <?php
                  $SaldoAngsuran = 0
                ?>
                @foreach($DataLaporan as $laporan)
                  @if($laporan->nilai_d != NULL && $laporan->no_akun == 520 || $laporan->nilai_k != NULL && $laporan->no_akun == 520)
                    <?php 
                      $SaldoAngsuran = $SaldoAngsuran + $laporan->nilai_d - $laporan->nilai_k;
                    ?>
                    <tr>
                      <td>{{ $laporan->tanggal }}</td>
                      <td>{{ $laporan->keterangan }}</td>
                      <td class="text-right">{{ number_format($laporan->nilai_d) }}</td>
                      <td class="text-right">{{ number_format($laporan->nilai_k) }}</td>
                      @if($SaldoAngsuran > 0)
                        <td class="text-right">{{ number_format($SaldoAngsuran) }}</td>
                        <td class="text-right">0</td>
                      @else
                        <td class="text-right">0</td>
                        <td class="text-right">{{ number_format(abs($SaldoAngsuran)) }}</td>
                      @endif
                    </tr>
                  @endif
                @endforeach

              @endif
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>