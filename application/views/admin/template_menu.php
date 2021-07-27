<li class="<?= is_active(2, 'home') ?>"><a href="<?= base_url() ?>admin/home">
        <i class="fa fa-home"></i>
        <span>Home</span>
    </a>
</li>

<li class="<?= is_active(2, 'user') ?>"><a href="<?= base_url() ?>admin/user">
        <i class="fa fa-users"></i>
        <span>User</span>
    </a>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-industry"></i> <span>Desa & Kecamatan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?= is_active(2, 'desa') ?>"><a href="<?= base_url('admin/desa') ?>"><i class="fa fa-industry"></i> Desa</a></li>
        <li class="<?= is_active(2, 'kecamatan') ?>"><a href="<?= base_url('admin/kecamatan') ?>"><i class="fa fa-language"></i> Kecamatan</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-star-o"></i> <span>Profile Desa</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?= is_active(2, 'lagu') ?>">
            <a href="<?= base_url('admin/lagu') ?>">
                <i class="fa fa-music"></i> Lagu
            </a>
        </li>
        <li class="<?= is_active(2, 'wisata') ?>">
            <a href="<?= base_url('admin/wisata') ?>">
                <i class="fa fa-picture-o"></i> Wisata
            </a>
        </li>
        <li class="<?= is_active(2, 'umkm') ?>">
            <a href="<?= base_url('admin/umkm') ?>">
                <i class="fa fa-building"></i> UMKM
            </a>
        </li>
        <li class="<?= is_active(2, 'batik') ?>">
            <a href="<?= base_url('admin/batik') ?>">
                <i class="fa fa-gg"></i> Batik
            </a>
        </li>
    </ul>
</li>


<li class="treeview">
    <a href="#">
        <i class="fa fa-desktop"></i> <span>Template</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?= is_active(2, 'slider') ?>"><a href="<?= base_url('admin/slider') ?>"><i class="fa fa-delicious"></i> Slider</a></li>
        <li class="<?= is_active(2, 'sprites') ?>"><a href="<?= base_url('admin/sprites') ?>"><i class="fa fa-pagelines"></i> Logo</a></li>
    </ul>
</li>



<?php
function is_active($segment_number, $segment_varchar)
{
    $ci = &get_instance();
    $is_active = "";
    if (strtolower($ci->uri->segment($segment_number)) == $segment_varchar) {
        $is_active = " active ";
    }
    return $is_active;
}
?>