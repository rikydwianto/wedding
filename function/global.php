<?php
function pindah_halaman($url)
{
?>
<script>
location.href = '<?= $url ?>';
</script>
<?php
}
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
function enkrip($text){
    return base64_encode($text);
}
function dekrip($text){
    return base64_decode($text);
}
?>