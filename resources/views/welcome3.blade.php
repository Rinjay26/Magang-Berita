<?php
$judul = "Ini Adalah Judul dari Class Component";
?>
<x-halaman-layout :title="$judul">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam earum provident ullam nulla nostrum. Modi fuga nemo minima itaque ea?</p>

    <x-slot name="tanggal">17 Agustus 2025</x-slot>
    <x-slot name="penulis">Rinjay</x-slot>
</x-halaman-layout>