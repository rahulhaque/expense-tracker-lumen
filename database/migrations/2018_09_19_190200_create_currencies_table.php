<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency_code', 100);
            $table->string('currency_name', 100);
            $table->text('country');
            $table->timestamps();
        });

        $this->initializeTable('currencies');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }

    /**
     * Initialize table with some data
     *
     * @param $table
     */
    public function initializeTable($table)
    {
        DB::table($table)->truncate();
        DB::table($table)->insert([
            ['currency_code' => 'AED', 'currency_name' => 'UAE Dirham', 'country' => 'UNITED ARAB EMIRATES (THE)'],
            ['currency_code' => 'AFN', 'currency_name' => 'Afghani', 'country' => 'AFGHANISTAN'],
            ['currency_code' => 'ALL', 'currency_name' => 'Lek', 'country' => 'ALBANIA'],
            ['currency_code' => 'AMD', 'currency_name' => 'Armenian Dram', 'country' => 'ARMENIA'],
            ['currency_code' => 'ANG', 'currency_name' => 'Netherlands Antillean Guilder', 'country' => 'CURAÇAO,SINT MAARTEN (DUTCH PART)'],
            ['currency_code' => 'AOA', 'currency_name' => 'Kwanza', 'country' => 'ANGOLA'],
            ['currency_code' => 'ARS', 'currency_name' => 'Argentine Peso', 'country' => 'ARGENTINA'],
            ['currency_code' => 'AUD', 'currency_name' => 'Australian Dollar', 'country' => 'AUSTRALIA,CHRISTMAS ISLAND,COCOS (KEELING) ISLANDS (THE),HEARD ISLAND AND McDONALD ISLANDS,KIRIBATI,NAURU,NORFOLK ISLAND,TUVALU'],
            ['currency_code' => 'AWG', 'currency_name' => 'Aruban Florin', 'country' => 'ARUBA'],
            ['currency_code' => 'AZN', 'currency_name' => 'Azerbaijan Manat', 'country' => 'AZERBAIJAN'],
            ['currency_code' => 'BAM', 'currency_name' => 'Convertible Mark', 'country' => 'BOSNIA AND HERZEGOVINA'],
            ['currency_code' => 'BBD', 'currency_name' => 'Barbados Dollar', 'country' => 'BARBADOS'],
            ['currency_code' => 'BDT', 'currency_name' => 'Taka', 'country' => 'BANGLADESH'],
            ['currency_code' => 'BGN', 'currency_name' => 'Bulgarian Lev', 'country' => 'BULGARIA'],
            ['currency_code' => 'BHD', 'currency_name' => 'Bahraini Dinar', 'country' => 'BAHRAIN'],
            ['currency_code' => 'BIF', 'currency_name' => 'Burundi Franc', 'country' => 'BURUNDI'],
            ['currency_code' => 'BMD', 'currency_name' => 'Bermudian Dollar', 'country' => 'BERMUDA'],
            ['currency_code' => 'BND', 'currency_name' => 'Brunei Dollar', 'country' => 'BRUNEI DARUSSALAM'],
            ['currency_code' => 'BOB', 'currency_name' => 'Boliviano', 'country' => 'BOLIVIA (PLURINATIONAL STATE OF)'],
            ['currency_code' => 'BOV', 'currency_name' => 'Mvdol', 'country' => 'BOLIVIA (PLURINATIONAL STATE OF)'],
            ['currency_code' => 'BRL', 'currency_name' => 'Brazilian Real', 'country' => 'BRAZIL'],
            ['currency_code' => 'BSD', 'currency_name' => 'Bahamian Dollar', 'country' => 'BAHAMAS (THE)'],
            ['currency_code' => 'BTN', 'currency_name' => 'Ngultrum', 'country' => 'BHUTAN'],
            ['currency_code' => 'BWP', 'currency_name' => 'Pula', 'country' => 'BOTSWANA'],
            ['currency_code' => 'BYN', 'currency_name' => 'Belarusian Ruble', 'country' => 'BELARUS'],
            ['currency_code' => 'BZD', 'currency_name' => 'Belize Dollar', 'country' => 'BELIZE'],
            ['currency_code' => 'CAD', 'currency_name' => 'Canadian Dollar', 'country' => 'CANADA'],
            ['currency_code' => 'CDF', 'currency_name' => 'Congolese Franc', 'country' => 'CONGO (THE DEMOCRATIC REPUBLIC OF THE)'],
            ['currency_code' => 'CHE', 'currency_name' => 'WIR Euro', 'country' => 'SWITZERLAND'],
            ['currency_code' => 'CHF', 'currency_name' => 'Swiss Franc', 'country' => 'LIECHTENSTEIN,SWITZERLAND'],
            ['currency_code' => 'CHW', 'currency_name' => 'WIR Franc', 'country' => 'SWITZERLAND'],
            ['currency_code' => 'CLF', 'currency_name' => 'Unidad de Fomento', 'country' => 'CHILE'],
            ['currency_code' => 'CLP', 'currency_name' => 'Chilean Peso', 'country' => 'CHILE'],
            ['currency_code' => 'CNY', 'currency_name' => 'Yuan Renminbi', 'country' => 'CHINA'],
            ['currency_code' => 'COP', 'currency_name' => 'Colombian Peso', 'country' => 'COLOMBIA'],
            ['currency_code' => 'COU', 'currency_name' => 'Unidad de Valor Real', 'country' => 'COLOMBIA'],
            ['currency_code' => 'CRC', 'currency_name' => 'Costa Rican Colon', 'country' => 'COSTA RICA'],
            ['currency_code' => 'CUC', 'currency_name' => 'Peso Convertible', 'country' => 'CUBA'],
            ['currency_code' => 'CUP', 'currency_name' => 'Cuban Peso', 'country' => 'CUBA'],
            ['currency_code' => 'CVE', 'currency_name' => 'Cabo Verde Escudo', 'country' => 'CABO VERDE'],
            ['currency_code' => 'CZK', 'currency_name' => 'Czech Koruna', 'country' => 'CZECHIA'],
            ['currency_code' => 'DJF', 'currency_name' => 'Djibouti Franc', 'country' => 'DJIBOUTI'],
            ['currency_code' => 'DKK', 'currency_name' => 'Danish Krone', 'country' => 'DENMARK,FAROE ISLANDS (THE),GREENLAND'],
            ['currency_code' => 'DOP', 'currency_name' => 'Dominican Peso', 'country' => 'DOMINICAN REPUBLIC (THE)'],
            ['currency_code' => 'DZD', 'currency_name' => 'Algerian Dinar', 'country' => 'ALGERIA'],
            ['currency_code' => 'EGP', 'currency_name' => 'Egyptian Pound', 'country' => 'EGYPT'],
            ['currency_code' => 'ERN', 'currency_name' => 'Nakfa', 'country' => 'ERITREA'],
            ['currency_code' => 'ETB', 'currency_name' => 'Ethiopian Birr', 'country' => 'ETHIOPIA'],
            ['currency_code' => 'EUR', 'currency_name' => 'Euro', 'country' => 'ALAND ISLANDS,ANDORRA,AUSTRIA,BELGIUM,CYPRUS,ESTONIA,EUROPEAN UNION,FINLAND,FRANCE,FRENCH GUIANA,FRENCH SOUTHERN TERRITORIES (THE),GERMANY,GREECE,GUADELOUPE,HOLY SEE (THE),IRELAND,ITALY,LATVIA,LITHUANIA,LUXEMBOURG,MALTA,MARTINIQUE,MAYOTTE,MONACO,MONTENEGRO,NETHERLANDS (THE),PORTUGAL,RÉUNION,SAINT BARTHÉLEMY,SAINT MARTIN (FRENCH PART),SAINT PIERRE AND MIQUELON,SAN MARINO,SLOVAKIA,SLOVENIA,SPAIN'],
            ['currency_code' => 'FJD', 'currency_name' => 'Fiji Dollar', 'country' => 'FIJI'],
            ['currency_code' => 'FKP', 'currency_name' => 'Falkland Islands Pound', 'country' => 'FALKLAND ISLANDS (THE) [MALVINAS]'],
            ['currency_code' => 'GBP', 'currency_name' => 'Pound Sterling', 'country' => 'GUERNSEY,ISLE OF MAN,JERSEY,UNITED KINGDOM OF GREAT BRITAIN AND NORTHERN IRELAND (THE)'],
            ['currency_code' => 'GEL', 'currency_name' => 'Lari', 'country' => 'GEORGIA'],
            ['currency_code' => 'GHS', 'currency_name' => 'Ghana Cedi', 'country' => 'GHANA'],
            ['currency_code' => 'GIP', 'currency_name' => 'Gibraltar Pound', 'country' => 'GIBRALTAR'],
            ['currency_code' => 'GMD', 'currency_name' => 'Dalasi', 'country' => 'GAMBIA (THE)'],
            ['currency_code' => 'GNF', 'currency_name' => 'Guinean Franc', 'country' => 'GUINEA'],
            ['currency_code' => 'GTQ', 'currency_name' => 'Quetzal', 'country' => 'GUATEMALA'],
            ['currency_code' => 'GYD', 'currency_name' => 'Guyana Dollar', 'country' => 'GUYANA'],
            ['currency_code' => 'HKD', 'currency_name' => 'Hong Kong Dollar', 'country' => 'HONG KONG'],
            ['currency_code' => 'HNL', 'currency_name' => 'Lempira', 'country' => 'HONDURAS'],
            ['currency_code' => 'HRK', 'currency_name' => 'Kuna', 'country' => 'CROATIA'],
            ['currency_code' => 'HTG', 'currency_name' => 'Gourde', 'country' => 'HAITI'],
            ['currency_code' => 'HUF', 'currency_name' => 'Forint', 'country' => 'HUNGARY'],
            ['currency_code' => 'IDR', 'currency_name' => 'Rupiah', 'country' => 'INDONESIA'],
            ['currency_code' => 'ILS', 'currency_name' => 'New Israeli Sheqel', 'country' => 'ISRAEL'],
            ['currency_code' => 'INR', 'currency_name' => 'Indian Rupee', 'country' => 'BHUTAN,INDIA'],
            ['currency_code' => 'IQD', 'currency_name' => 'Iraqi Dinar', 'country' => 'IRAQ'],
            ['currency_code' => 'IRR', 'currency_name' => 'Iranian Rial', 'country' => 'IRAN (ISLAMIC REPUBLIC OF)'],
            ['currency_code' => 'ISK', 'currency_name' => 'Iceland Krona', 'country' => 'ICELAND'],
            ['currency_code' => 'JMD', 'currency_name' => 'Jamaican Dollar', 'country' => 'JAMAICA'],
            ['currency_code' => 'JOD', 'currency_name' => 'Jordanian Dinar', 'country' => 'JORDAN'],
            ['currency_code' => 'JPY', 'currency_name' => 'Yen', 'country' => 'JAPAN'],
            ['currency_code' => 'KES', 'currency_name' => 'Kenyan Shilling', 'country' => 'KENYA'],
            ['currency_code' => 'KGS', 'currency_name' => 'Som', 'country' => 'KYRGYZSTAN'],
            ['currency_code' => 'KHR', 'currency_name' => 'Riel', 'country' => 'CAMBODIA'],
            ['currency_code' => 'KMF', 'currency_name' => 'Comorian Franc ', 'country' => 'COMOROS (THE)'],
            ['currency_code' => 'KPW', 'currency_name' => 'North Korean Won', 'country' => 'KOREA (THE DEMOCRATIC PEOPLE’S REPUBLIC OF)'],
            ['currency_code' => 'KRW', 'currency_name' => 'Won', 'country' => 'KOREA (THE REPUBLIC OF)'],
            ['currency_code' => 'KWD', 'currency_name' => 'Kuwaiti Dinar', 'country' => 'KUWAIT'],
            ['currency_code' => 'KYD', 'currency_name' => 'Cayman Islands Dollar', 'country' => 'CAYMAN ISLANDS (THE)'],
            ['currency_code' => 'KZT', 'currency_name' => 'Tenge', 'country' => 'KAZAKHSTAN'],
            ['currency_code' => 'LAK', 'currency_name' => 'Lao Kip', 'country' => 'LAO PEOPLE’S DEMOCRATIC REPUBLIC (THE)'],
            ['currency_code' => 'LBP', 'currency_name' => 'Lebanese Pound', 'country' => 'LEBANON'],
            ['currency_code' => 'LKR', 'currency_name' => 'Sri Lanka Rupee', 'country' => 'SRI LANKA'],
            ['currency_code' => 'LRD', 'currency_name' => 'Liberian Dollar', 'country' => 'LIBERIA'],
            ['currency_code' => 'LSL', 'currency_name' => 'Loti', 'country' => 'LESOTHO'],
            ['currency_code' => 'LYD', 'currency_name' => 'Libyan Dinar', 'country' => 'LIBYA'],
            ['currency_code' => 'MAD', 'currency_name' => 'Moroccan Dirham', 'country' => 'WESTERN SAHARA,MOROCCO'],
            ['currency_code' => 'MDL', 'currency_name' => 'Moldovan Leu', 'country' => 'MOLDOVA (THE REPUBLIC OF)'],
            ['currency_code' => 'MGA', 'currency_name' => 'Malagasy Ariary', 'country' => 'MADAGASCAR'],
            ['currency_code' => 'MKD', 'currency_name' => 'Denar', 'country' => 'MACEDONIA (THE FORMER YUGOSLAV REPUBLIC OF)'],
            ['currency_code' => 'MMK', 'currency_name' => 'Kyat', 'country' => 'MYANMAR'],
            ['currency_code' => 'MNT', 'currency_name' => 'Tugrik', 'country' => 'MONGOLIA'],
            ['currency_code' => 'MOP', 'currency_name' => 'Pataca', 'country' => 'MACAO'],
            ['currency_code' => 'MRU', 'currency_name' => 'Ouguiya', 'country' => 'MAURITANIA'],
            ['currency_code' => 'MUR', 'currency_name' => 'Mauritius Rupee', 'country' => 'MAURITIUS'],
            ['currency_code' => 'MVR', 'currency_name' => 'Rufiyaa', 'country' => 'MALDIVES'],
            ['currency_code' => 'MWK', 'currency_name' => 'Malawi Kwacha', 'country' => 'MALAWI'],
            ['currency_code' => 'MXN', 'currency_name' => 'Mexican Peso', 'country' => 'MEXICO'],
            ['currency_code' => 'MXV', 'currency_name' => 'Mexican Unidad de Inversion (UDI)', 'country' => 'MEXICO'],
            ['currency_code' => 'MYR', 'currency_name' => 'Malaysian Ringgit', 'country' => 'MALAYSIA'],
            ['currency_code' => 'MZN', 'currency_name' => 'Mozambique Metical', 'country' => 'MOZAMBIQUE'],
            ['currency_code' => 'NAD', 'currency_name' => 'Namibia Dollar', 'country' => 'NAMIBIA'],
            ['currency_code' => 'NGN', 'currency_name' => 'Naira', 'country' => 'NIGERIA'],
            ['currency_code' => 'NIO', 'currency_name' => 'Cordoba Oro', 'country' => 'NICARAGUA'],
            ['currency_code' => 'NOK', 'currency_name' => 'Norwegian Krone', 'country' => 'BOUVET ISLAND,NORWAY,SVALBARD AND JAN MAYEN'],
            ['currency_code' => 'NPR', 'currency_name' => 'Nepalese Rupee', 'country' => 'NEPAL'],
            ['currency_code' => 'NZD', 'currency_name' => 'New Zealand Dollar', 'country' => 'COOK ISLANDS (THE),NEW ZEALAND,NIUE,PITCAIRN,TOKELAU'],
            ['currency_code' => 'OMR', 'currency_name' => 'Rial Omani', 'country' => 'OMAN'],
            ['currency_code' => 'PAB', 'currency_name' => 'Balboa', 'country' => 'PANAMA'],
            ['currency_code' => 'PEN', 'currency_name' => 'Sol', 'country' => 'PERU'],
            ['currency_code' => 'PGK', 'currency_name' => 'Kina', 'country' => 'PAPUA NEW GUINEA'],
            ['currency_code' => 'PHP', 'currency_name' => 'Philippine Peso', 'country' => 'PHILIPPINES (THE)'],
            ['currency_code' => 'PKR', 'currency_name' => 'Pakistan Rupee', 'country' => 'PAKISTAN'],
            ['currency_code' => 'PLN', 'currency_name' => 'Zloty', 'country' => 'POLAND'],
            ['currency_code' => 'PYG', 'currency_name' => 'Guarani', 'country' => 'PARAGUAY'],
            ['currency_code' => 'QAR', 'currency_name' => 'Qatari Rial', 'country' => 'QATAR'],
            ['currency_code' => 'RON', 'currency_name' => 'Romanian Leu', 'country' => 'ROMANIA'],
            ['currency_code' => 'RSD', 'currency_name' => 'Serbian Dinar', 'country' => 'SERBIA'],
            ['currency_code' => 'RUB', 'currency_name' => 'Russian Ruble', 'country' => 'RUSSIAN FEDERATION (THE)'],
            ['currency_code' => 'RWF', 'currency_name' => 'Rwanda Franc', 'country' => 'RWANDA'],
            ['currency_code' => 'SAR', 'currency_name' => 'Saudi Riyal', 'country' => 'SAUDI ARABIA'],
            ['currency_code' => 'SBD', 'currency_name' => 'Solomon Islands Dollar', 'country' => 'SOLOMON ISLANDS'],
            ['currency_code' => 'SCR', 'currency_name' => 'Seychelles Rupee', 'country' => 'SEYCHELLES'],
            ['currency_code' => 'SDG', 'currency_name' => 'Sudanese Pound', 'country' => 'SUDAN (THE)'],
            ['currency_code' => 'SEK', 'currency_name' => 'Swedish Krona', 'country' => 'SWEDEN'],
            ['currency_code' => 'SGD', 'currency_name' => 'Singapore Dollar', 'country' => 'SINGAPORE'],
            ['currency_code' => 'SHP', 'currency_name' => 'Saint Helena Pound', 'country' => 'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA'],
            ['currency_code' => 'SLL', 'currency_name' => 'Leone', 'country' => 'SIERRA LEONE'],
            ['currency_code' => 'SOS', 'currency_name' => 'Somali Shilling', 'country' => 'SOMALIA'],
            ['currency_code' => 'SRD', 'currency_name' => 'Surinam Dollar', 'country' => 'SURINAME'],
            ['currency_code' => 'SSP', 'currency_name' => 'South Sudanese Pound', 'country' => 'SOUTH SUDAN'],
            ['currency_code' => 'STN', 'currency_name' => 'Dobra', 'country' => 'SAO TOME AND PRINCIPE'],
            ['currency_code' => 'SVC', 'currency_name' => 'El Salvador Colon', 'country' => 'EL SALVADOR'],
            ['currency_code' => 'SYP', 'currency_name' => 'Syrian Pound', 'country' => 'SYRIAN ARAB REPUBLIC'],
            ['currency_code' => 'SZL', 'currency_name' => 'Lilangeni', 'country' => 'ESWATINI'],
            ['currency_code' => 'THB', 'currency_name' => 'Baht', 'country' => 'THAILAND'],
            ['currency_code' => 'TJS', 'currency_name' => 'Somoni', 'country' => 'TAJIKISTAN'],
            ['currency_code' => 'TMT', 'currency_name' => 'Turkmenistan New Manat', 'country' => 'TURKMENISTAN'],
            ['currency_code' => 'TND', 'currency_name' => 'Tunisian Dinar', 'country' => 'TUNISIA'],
            ['currency_code' => 'TOP', 'currency_name' => 'Pa’anga', 'country' => 'TONGA'],
            ['currency_code' => 'TRY', 'currency_name' => 'Turkish Lira', 'country' => 'TURKEY'],
            ['currency_code' => 'TTD', 'currency_name' => 'Trinidad and Tobago Dollar', 'country' => 'TRINIDAD AND TOBAGO'],
            ['currency_code' => 'TWD', 'currency_name' => 'New Taiwan Dollar', 'country' => 'TAIWAN (PROVINCE OF CHINA)'],
            ['currency_code' => 'TZS', 'currency_name' => 'Tanzanian Shilling', 'country' => 'TANZANIA, UNITED REPUBLIC OF'],
            ['currency_code' => 'UAH', 'currency_name' => 'Hryvnia', 'country' => 'UKRAINE'],
            ['currency_code' => 'UGX', 'currency_name' => 'Uganda Shilling', 'country' => 'UGANDA'],
            ['currency_code' => 'USD', 'currency_name' => 'US Dollar', 'country' => 'VIRGIN ISLANDS (BRITISH),AMERICAN SAMOA,VIRGIN ISLANDS (U.S.),BONAIRE, SINT EUSTATIUS AND SABA,BRITISH INDIAN OCEAN TERRITORY (THE),ECUADOR,EL SALVADOR,GUAM,HAITI,MARSHALL ISLANDS (THE),MICRONESIA (FEDERATED STATES OF),NORTHERN MARIANA ISLANDS (THE),PALAU,PANAMA,PUERTO RICO,TIMOR-LESTE,TURKS AND CAICOS ISLANDS (THE),UNITED STATES MINOR OUTLYING ISLANDS (THE),UNITED STATES OF AMERICA (THE)'],
            ['currency_code' => 'USN', 'currency_name' => 'US Dollar (Next day)', 'country' => 'UNITED STATES OF AMERICA (THE)'],
            ['currency_code' => 'UYI', 'currency_name' => 'Uruguay Peso en Unidades Indexadas (UI)', 'country' => 'URUGUAY'],
            ['currency_code' => 'UYU', 'currency_name' => 'Peso Uruguayo', 'country' => 'URUGUAY'],
            ['currency_code' => 'UYW', 'currency_name' => 'Unidad Previsional', 'country' => 'URUGUAY'],
            ['currency_code' => 'UZS', 'currency_name' => 'Uzbekistan Sum', 'country' => 'UZBEKISTAN'],
            ['currency_code' => 'VES', 'currency_name' => 'Bolívar Soberano', 'country' => 'VENEZUELA (BOLIVARIAN REPUBLIC OF)'],
            ['currency_code' => 'VND', 'currency_name' => 'Dong', 'country' => 'VIET NAM'],
            ['currency_code' => 'VUV', 'currency_name' => 'Vatu', 'country' => 'VANUATU'],
            ['currency_code' => 'WST', 'currency_name' => 'Tala', 'country' => 'SAMOA'],
            ['currency_code' => 'XAF', 'currency_name' => 'CFA Franc BEAC', 'country' => 'CAMEROON,CENTRAL AFRICAN REPUBLIC (THE),CHAD,CONGO (THE),EQUATORIAL GUINEA,GABON'],
            ['currency_code' => 'XCD', 'currency_name' => 'East Caribbean Dollar', 'country' => 'ANGUILLA,ANTIGUA AND BARBUDA,DOMINICA,GRENADA,MONTSERRAT,SAINT KITTS AND NEVIS,SAINT LUCIA,SAINT VINCENT AND THE GRENADINES'],
            ['currency_code' => 'XDR', 'currency_name' => 'SDR (Special Drawing Right)', 'country' => 'INTERNATIONAL MONETARY FUND (IMF)'],
            ['currency_code' => 'XOF', 'currency_name' => 'CFA Franc BCEAO', 'country' => 'BENIN,BURKINA FASO,CÔTE DIVOIRE,GUINEA-BISSAU,MALI,NIGER (THE),SENEGAL,TOGO'],
            ['currency_code' => 'XPF', 'currency_name' => 'CFP Franc', 'country' => 'WALLIS AND FUTUNA,FRENCH POLYNESIA,NEW CALEDONIA'],
            ['currency_code' => 'XSU', 'currency_name' => 'Sucre', 'country' => 'SISTEMA UNITARIO DE COMPENSACION REGIONAL DE PAGOS SUCRE'],
            ['currency_code' => 'XUA', 'currency_name' => 'ADB Unit of Account', 'country' => 'MEMBER COUNTRIES OF THE AFRICAN DEVELOPMENT BANK GROUP'],
            ['currency_code' => 'YER', 'currency_name' => 'Yemeni Rial', 'country' => 'YEMEN'],
            ['currency_code' => 'ZAR', 'currency_name' => 'Rand', 'country' => 'LESOTHO,NAMIBIA,SOUTH AFRICA'],
            ['currency_code' => 'ZMW', 'currency_name' => 'Zambian Kwacha', 'country' => 'ZAMBIA'],
            ['currency_code' => 'ZWL', 'currency_name' => 'Zimbabwe Dollar', 'country' => 'ZIMBABWE'],
        ]);
    }
}
