<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dosen;
use App\Models\Proyek;
use App\Models\Kegiatan;
use App\Models\Kelompok;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ridho Alba',
            'nim' => 'E32210496',
            'email' => 'e32210496@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 1
        ]);
        User::create([
            'name' => 'Deva Baskara Utoyo',
            'nim' => 'E32210906',
            'email' => 'e32210906@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'M. Fajarsyah Eka Permana',
            'nim' => 'E32210771',
            'email' => 'e32210771@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Mohammad Irnanda',
            'nim' => 'E32211535',
            'email' => 'e32210535@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Gusti Arliz Nandito',
            'nim' => 'E32210743',
            'email' => 'e32210743@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Putra Ahmad Mudakir',
            'nim' => 'E32211894',
            'email' => 'e32211894@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 12
        ]);
        User::create([
            'name' => 'Ananda Anggi Dwi Cahyo',
            'nim' => 'E32212299',
            'email' => 'e32212299@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 12
        ]);
        User::create([
            'name' => 'Mohammad Yunus Wicaksono',
            'nim' => 'E32210581',
            'email' => 'e32210581@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 12
        ]);
        User::create([
            'name' => 'Khoirul Tamami',
            'nim' => 'E32212309',
            'email' => 'e32212309@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 12
        ]);
        User::create([
            'name' => 'Dimas Dwi Apriliyanto',
            'nim' => 'E32210053',
            'email' => 'e32210053@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 4
        ]);
        User::create([
            'name' => 'Vinkcy Firman Pratama',
            'nim' => 'E32210103',
            'email' => 'e32210103@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 4
        ]);
        User::create([
            'name' => 'Rachman Tio Maulana',
            'nim' => 'E32210055',
            'email' => 'e32210055@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 4
        ]);
        User::create([
            'name' => 'Damar Rawuh Sarjito',
            'nim' => 'E32210095',
            'email' => 'e32210095@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 4
        ]);
        User::create([
            'name' => 'I Putu Sri Kresna Loru Ariasa',
            'nim' => 'E32211429',
            'email' => 'e32211429@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 3
        ]);
        User::create([
            'name' => 'Karel Sumda Aswadi',
            'nim' => 'E32211700',
            'email' => 'e32211700@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 3
        ]);
        User::create([
            'name' => 'Muhammad Zakaria Firmansyah',
            'nim' => 'E32211416',
            'email' => 'e32211416@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 3
        ]);
        User::create([
            'name' => 'Moch Sahputra ',
            'nim' => 'E32210799',
            'email' => 'e32210799@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 3
        ]);
        User::create([
            'name' => 'Dany Ferdyansyah',
            'nim' => 'E32210111',
            'email' => 'e32210111@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 1
        ]);
        User::create([
            'name' => 'Izza Ismi Aisyiyah',
            'nim' => 'E32210222',
            'email' => 'e32210222@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 1
        ]);
        User::create([
            'name' => 'Safina Damayanti',
            'nim' => 'E32210409',
            'email' => 'e32210409@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 1
        ]);
        User::create([
            'name' => 'Zaim Maulana Hakim',
            'nim' => 'E32210167',
            'email' => 'e32210167@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Rajiv Ibnu Darojad',
            'nim' => 'E32211938',
            'email' => 'e32211938@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Nurul Huda',
            'nim' => 'E32212239',
            'email' => 'e32212239@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Fahrul Umam',
            'nim' => 'E32211904',
            'email' => 'e32211904@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Mohammad Agil Andriansyah',
            'nim' => 'E32211340',
            'email' => 'e32211340@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Zulfahmi Yusril Firmansyah',
            'nim' => 'E32211474',
            'email' => 'e32211474@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Hifni Dana Abdillah',
            'nim' => 'E32211801',
            'email' => 'e32211801@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Nararga Maulana',
            'nim' => 'E32210989',
            'email' => 'e32210989@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Feny Azizah Komariyah',
            'nim' => 'E32210550',
            'email' => 'e32210550@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 10
        ]);
        User::create([
            'name' => 'Diana Nafisa',
            'nim' => 'E32210585',
            'email' => 'e32210585@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 10
        ]);
        User::create([
            'name' => 'Dyah Ridwiyanti Isnaini',
            'nim' => 'E32210589',
            'email' => 'e32210589@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 10
        ]);
        User::create([
            'name' => 'Nuris Mahbubah',
            'nim' => 'E32210059',
            'email' => 'e32210059@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 10
        ]);
        User::create([
            'name' => 'Anna Salsabila Fyanis',
            'nim' => 'E32210977',
            'email' => 'e32210977@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 11
        ]);
        User::create([
            'name' => 'Ismi Aprilia',
            'nim' => 'E32210080',
            'email' => 'e32210080@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 11
        ]);
        User::create([
            'name' => 'Putri Marwatus Soleha',
            'nim' => 'E32210709',
            'email' => 'e32210709@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 11
        ]);
        User::create([
            'name' => 'Dewi Rismawati',
            'nim' => 'E32211798',
            'email' => 'e32211798@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 11
        ]);
        User::create([
            'name' => 'Rezainal Vito',
            'nim' => 'E32210750',
            'email' => 'e32210750@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Wahyu Eko Prayoga',
            'nim' => 'E32210697',
            'email' => 'e32210697@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Arief Hidayatullah',
            'nim' => 'E32210823',
            'email' => 'e32210823@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Moch. Atfal Prima Difta',
            'nim' => 'E32210691',
            'email' => 'e32210691@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Akbar Wijaya',
            'nim' => 'E32210490',
            'email' => 'e32210490@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 5
        ]);
        User::create([
            'name' => 'Nuril Akbar',
            'nim' => 'E32210493',
            'email' => 'e32210493@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 5
        ]);
        User::create([
            'name' => 'Ryan Ajeng Sukma Dewi T.P',
            'nim' => 'E32210446',
            'email' => 'e32210446@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 5
        ]);
        User::create([
            'name' => 'Nabila Arrohmah',
            'nim' => 'E32211615',
            'email' => 'e32211615@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 5
        ]);
        User::create([
            'name' => 'Alfiani Nur Aziza',
            'nim' => 'E32211811',
            'email' => 'e32211811@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Condro Asep S.',
            'nim' => 'E32212193',
            'email' => 'e32212193@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Sindy Permata Zahro',
            'nim' => 'E32211813',
            'email' => 'e32211813@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Nanda Arsya Salsabillah',
            'nim' => 'E32211710',
            'email' => 'e32211710@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Aman Ahcyad',
            'nim' => 'E32211505',
            'email' => 'e32211505@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Nadia Hidayanti Suseno',
            'nim' => 'E32211683',
            'email' => 'e32211683@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Nelsen Ardiansah',
            'nim' => 'E32211375',
            'email' => 'e32211375@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Lutfi Ardiansyah',
            'nim' => 'E32211395',
            'email' => 'e32211395@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Mufidah Eka Alva Nadya',
            'nim' => 'E32210897',
            'email' => 'e32210897@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Akbar Maulana Firdaus',
            'nim' => 'E32211706',
            'email' => 'e32211706@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Naufal Affan Samudra',
            'nim' => 'E32210736',
            'email' => 'e32210736@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Siti Khadijah',
            'nim' => 'E32210665',
            'email' => 'e32210665@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Firdaus Nico Saputra',
            'nim' => 'E32210601',
            'email' => 'e32210601@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Ahmad Zitni Mushtofa',
            'nim' => 'E32210777',
            'email' => 'e32210777@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Sahrul Gunawan',
            'nim' => 'E32210755',
            'email' => 'e32210755@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Sylva Aditya Arfiansyah',
            'nim' => 'E32210675',
            'email' => 'e32210675@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Ahmad Faizin',
            'nim' => 'E32210638',
            'email' => 'e32210638@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 8
        ]);
        User::create([
            'name' => 'Alfan Al Ikhsan',
            'nim' => 'E32210886',
            'email' => 'e32210886@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 8
        ]);
        User::create([
            'name' => 'Siti Aisyah',
            'nim' => 'E32210862',
            'email' => 'e32210862@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 7
        ]);
        User::create([
            'name' => 'Mutyara Pertiwi',
            'nim' => 'E32210813',
            'email' => 'e32210813@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 7
        ]);
        User::create([
            'name' => 'Muhammad Egardy Hidayad',
            'nim' => 'E32210350',
            'email' => 'e32210350@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 9
        ]);
        User::create([
            'name' => 'Cipta Gentha Dimas Y.M',
            'nim' => 'E32210138',
            'email' => 'e32210138@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 9
        ]);
        User::create([
            'name' => 'Reza Anggara Januarta P.B.S',
            'nim' => 'E32210344',
            'email' => 'e32210344@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 9
        ]);
        User::create([
            'name' => 'Ipung Nurhanianzah',
            'nim' => 'E32210278',
            'email' => 'e32210278@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 9
        ]);
        User::create([
            'name' => 'Ahmad Ridho',
            'nim' => 'E32211859',
            'email' => 'e32211859@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Hidayah Aliy Fisabilillah',
            'nim' => 'E32201381',
            'email' => 'e32201381@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Faiz Zain Habibi',
            'nim' => 'E32210179',
            'email' => 'e32210179@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Ghilman roif zakiri',
            'nim' => 'E32212281',
            'email' => 'e32212281@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Maulana Wira Wisesa',
            'nim' => 'E32211783',
            'email' => 'e32211783@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Adhimas Rayhan Tritama',
            'nim' => 'E32211537',
            'email' => 'e32211537@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Habib Zein',
            'nim' => 'E32211306',
            'email' => 'e32211306@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Ahmad hanafi',
            'nim' => 'E32211602',
            'email' => 'e32211602@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Mohammad Rodivol Hak',
            'nim' => 'E32200666',
            'email' => 'e32200666@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Izza Alfiansyah',
            'nim' => 'E32211868',
            'email' => 'e32211868@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Ivan Ahmad Zidane',
            'nim' => 'E32211980',
            'email' => 'e32211980@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Dimas Maulana Iqbal',
            'nim' => 'E32211895',
            'email' => 'e32211895@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'M. Pinasih Pamuncak',
            'nim' => 'E32211899',
            'email' => 'e32211899@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Raga Mulya Pratama Putra',
            'nim' => 'E32212287',
            'email' => 'e32212287@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Oneal Prama Kalingga',
            'nim' => 'E32211884',
            'email' => 'e32211884@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Dea Fitri Qurrota Ayun',
            'nim' => 'E32200213',
            'email' => 'e32200213@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Dianatul Fitriyah',
            'nim' => 'E32211861',
            'email' => 'e32211861@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Ridho Dwicahya Wijaya',
            'nim' => 'E32212364',
            'email' => 'e32212364@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Dicky Rahmat Firmansyah',
            'nim' => 'E32212203',
            'email' => 'e32212203@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Indra Wijaya',
            'nim' => 'E32212333',
            'email' => 'e32212333@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Yusril Izza Apriliansyah',
            'nim' => 'E32210196',
            'email' => 'e32210196@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Muhammad Kholilurrohman',
            'nim' => 'E32211889',
            'email' => 'e32211889@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Yanuar Adi Nandra',
            'nim' => 'E32211886',
            'email' => 'e32211886@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Arsya Duta Pratama',
            'nim' => 'E32211977',
            'email' => 'e32211977@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Nanda Fathurahman',
            'nim' => 'E32200194',
            'email' => 'e32200194@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => null
        ]);
        User::create([
            'name' => 'Icha Aulia Putri Ambarwati',
            'nim' => 'E32210892',
            'email' => 'e32210892@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 6
        ]);
        User::create([
            'name' => 'Imandito Abthal Akbar',
            'nim' => 'E32210688',
            'email' => 'e32210688@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 6
        ]);
        User::create([
            'name' => 'Gheril Arofani',
            'nim' => 'E32210786',
            'email' => 'e32210786@student.polije.ac.id',
            'password' => bcrypt('12345'),
            'kelompok_id' => 6
        ]);

        // DOSEN
        Dosen::create([
            'name' => 'Surateno, S.KOM., M.Kom',
            'nip' => '197907032003121001',
            'email' => 'ratno@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Agus Hariyanto, ST, M.Kom',
            'nip' => '197808172003121005',
            'email' => 'agus_hariyanto@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Hariyono Rakhmad, S.Pd, M.Kom',
            'nip' => '197011282003121001',
            'email' => 'hariyono_r@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Denny Wijanarko, ST, MT',
            'nip' => '197809082005011001',
            'email' => 'dennywijanarko@gmail.com',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Yogiswara, ST, MT',
            'nip' => '197009292003121001',
            'email' => 'yogipoltek@gmail.com',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Agus Purwadi, ST.MT',
            'nip' => '197308312008011003',
            'email' => 'agus_purwadi@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Bekti Maryuni Susanto, S.Pd.T, M.Kom',
            'nip' => '198406252015041004',
            'email' => 'bekti@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Victor Phoa, S.Si, M.Cs',
            'nip' => '198510312018031001',
            'email' => 'victor_phoa@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'I Gede Wiryawan, S.Kom., M.Kom.',
            'nip' => '198801172019031008',
            'email' => 'wiryawan@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Lalitya Nindita Sahenda, S.Pd., M.T.',
            'nip' => '199411232020122010',
            'email' => 'lalitya.ns@polije.ac.id',
            'password' => bcrypt('12345'),
            'is_korbid' => 1
        ]);
        Dosen::create([
            'name' => 'Shabrina Choirunnisa, S.Kom., M.Kom.',
            'nip' => '199304252022032008',
            'email' => 'shabrinacnisa@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Beni Widiawan, S.ST, MT',
            'nip' => ' 197808162005011002',
            'email' => 'beni@polije.ac.id',
            'password' => bcrypt('12345')
        ]);
        Dosen::create([
            'name' => 'Muhammad Hafidh Firmansyah, S.Tr.Kom., M.Sc.',
            'nip' => '1111111111',
            'email' => 'hafidh@polije.ac.id',
            'password' => bcrypt('12345')
        ]);


        // Kelompok Magang
        Kelompok::create([
            'nama' => 'PT. Mega Artha Lintas Data Situbondo',
            'dosen_id' => 10
        ]);
        Kelompok::create([
            'nama' => 'PT. Mega Artha Lintas Data Jember',
            'dosen_id' => 4
        ]);
        Kelompok::create([
            'nama' => 'Diskominfo Kabupaten Malang',
            'dosen_id' => 10
        ]);
        Kelompok::create([
            'nama' => 'Xeno Persada Teknologi Surabaya',
            'dosen_id' => 8
        ]);
        Kelompok::create([
            'nama' => 'Icon+ Surabaya',
            'dosen_id' => null
        ]);
        Kelompok::create([
            'nama' => 'Habibi Garden Bandung',
            'dosen_id' => null
        ]);
        Kelompok::create([
            'nama' => 'Puslitkoka Jember',
            'dosen_id' => 1
        ]);
        Kelompok::create([
            'nama' => 'Diskominfo Probolinggo',
            'dosen_id' => 5
        ]);
        Kelompok::create([
            'nama' => 'Mangli Djaya Raya Jember',
            'dosen_id' => null
        ]);
        Kelompok::create([
            'nama' => 'Mark Design Surabaya',
            'dosen_id' => null
        ]);
        Kelompok::create([
            'nama' => 'Telkom Akses Jember',
            'dosen_id' => null
        ]);
        Kelompok::create([
            'nama' => 'PT Telkom Pasuruan',
            'dosen_id' => null
        ]);


        // Dosen::factory(10)->gmail()->create();
        // User::factory(10)->gmail()->create();
        // Kegiatan::factory(20)->create();
        // Proyek::factory(20)->create();
        // Kelompok::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        
    }
}
