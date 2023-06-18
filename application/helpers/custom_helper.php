<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cvt_no')) {
    function cvt_no($nohp)
    {
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(" ", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace("(", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")", "", $nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace(".", "", $nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nohp), 0, 3) == '+62') {
                $hp = trim($nohp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '+62' . substr(trim($nohp), 1);
            }
        }
        print $hp;
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal, $cetak_hari = false, $cetak_jam = false, $hari_only = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $split = explode(' ', $tanggal);
        $tgl = explode('-', $split[0]);
        // $jam = explode(':', $split[1]);

        $tgl_indo = $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];

        if ($cetak_hari == true && $cetak_jam == false) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }

        // if ($cetak_hari == true && $cetak_jam == true) {
        //     $num = date('N', strtotime($tanggal));
        //     return $hari[$num] . ', ' . $tgl_indo . ' | ' . $jam[0] . ':' . $jam[1] . ' WIB';
        // }

        // if ($cetak_hari == false && $cetak_jam == true) {
        //     return $tgl_indo . ' | ' . $jam[0] . ':' . $jam[1] . ' WIB';
        // }

        if ($cetak_hari == false && $cetak_jam == false && $hari_only == true) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num];
        }

        return $tgl_indo;
    }
}

if (!function_exists('random_str')) {
    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}

if (!function_exists('trim_description')) {
    function trim_description($text, $limit = 100, $escape = true)
    {
        $trimed_text = substr($text, 0, $limit);
        if (strlen($trimed_text) < strlen($text)) {
            $trimed_text .= '...';
        }
        if ($escape) {
            $trimed_text = html_escape($trimed_text);
        }
        return $trimed_text;
    }
}
