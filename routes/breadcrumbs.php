<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// ============================================================================================================
//gejala
Breadcrumbs::for('gejala_index', function (BreadcrumbTrail $trail) {
    $trail->push('Data gejala', route('gejala.index'));
});
//gejala > Tambah
Breadcrumbs::for('gejala-tambah', function (BreadcrumbTrail $trail) {
    $trail->parent('gejala_index');
    $trail->push('Tambah gejala', route('gejala.create'));
});
//gejala > Edit
Breadcrumbs::for('gejala-edit', function (BreadcrumbTrail $trail, $gejala) {
    $trail->parent('gejala_index');
    $trail->push('Edit', route('gejala.edit', $gejala));
    $trail->push($gejala->kd_gejala . ' - ' . $gejala->gejala, route('gejala.edit', $gejala));
});
// ============================================================================================================
//penyakit
Breadcrumbs::for('penyakit_index', function (BreadcrumbTrail $trail) {
    $trail->push('Data penyakit', route('penyakit.index'));
});
//penyakit > Tambah
Breadcrumbs::for('penyakit-tambah', function (BreadcrumbTrail $trail) {
    $trail->parent('penyakit_index');
    $trail->push('Tambah penyakit', route('penyakit.create'));
});
//penyakit > Edit
Breadcrumbs::for('penyakit-edit', function (BreadcrumbTrail $trail, $penyakit) {
    $trail->parent('penyakit_index');
    $trail->push('Edit', route('penyakit.edit', $penyakit));
    $trail->push($penyakit->kd_penyakit . ' - ' . $penyakit->penyakit, route('penyakit.edit', $penyakit));
});
// ============================================================================================================
//Rule
Breadcrumbs::for('rule_index', function (BreadcrumbTrail $trail) {
    $trail->push('Data rule', route('rule.index'));
});
//Rule > Tambah
Breadcrumbs::for('rule-tambah', function (BreadcrumbTrail $trail) {
    $trail->parent('rule_index');
    $trail->push('Tambah rule', route('rule.create'));
});
//Rule > Edit
Breadcrumbs::for('rule-edit', function (BreadcrumbTrail $trail, $penyakit) {
    $trail->parent('rule_index');
    $trail->push('Edit', route('rule.edit', $penyakit));
    // $trail->push($penyakit->kd_penyakit . ' - ' . $penyakit->penyakit, route('rule.edit', $penyakit));
});
// ============================================================================================================
//diagnosa
Breadcrumbs::for('diagnosa_index', function (BreadcrumbTrail $trail) {
    $trail->push('Data diagnosa', route('diagnosa.index'));
});
//Rule > Tambah
Breadcrumbs::for('diagnosa-tambah', function (BreadcrumbTrail $trail) {
    $trail->parent('diagnosa_index');
    $trail->push('Tambah diagnosa', route('diagnosa.create'));
});

// User
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->push('User', route('user.index'));
});

// User > Tambah
Breadcrumbs::for('user-tambah', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push('Tambah User', route('user.create'));
});

//User > Edit
Breadcrumbs::for('user-edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('user');
    $trail->push('Edit', route('user.edit', $user));
    $trail->push($user->name, route('user.edit', $user));
});
// ============================================================================================================
