<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Tests;

use PHPViet\NumberToWords\Transformer;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class NumberTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTransform($expect, $number)
    {
        $this->assertEquals($expect, $this->transformer->toWords($number));
    }

    /**
     * @dataProvider minusDataProvider
     */
    public function testMinusTransform($expect, $number)
    {
        $this->assertEquals($expect, $this->transformer->toWords($number));
    }

    /**
     * @dataProvider fractionDataProvider
     */
    public function testFractionTransform($expect, $float)
    {
        $this->assertEquals($expect, $this->transformer->toWords($float));
    }

    /**
     * @dataProvider decimalPartDataProvider
     */
    public function testSetDecimalPart($expect, $float, $decimalPart)
    {
        $transformer =  new Transformer($this->dictionary, $decimalPart);

        $this->assertEquals($expect, $transformer->toWords($float));
    }

    public function decimalPartDataProvider(): array
    {
        return [
            ['không', 0, 1],
            ['một nghìn', 1000, 2],
            ['một nghìn không trăm linh một', 1001, 3],
            ['một nghìn không trăm linh hai', 1002, 4],
            ['âm không phẩy mười', -0.1, 2],
            ['âm chín mươi chín', -99, 3],
            ['âm chín mươi tám', -98, 4],
            ['không phẩy ba trăm bảy mươi chín', 0.378758, 3],
            ['không phẩy chín mươi hai', 0.922174, 2],
            ['năm trăm bảy mươi ba phẩy năm mươi tám', 573.58, 2],
            ['sáu trăm sáu mươi chín phẩy mười bốn', 669.135, 2],
            ['ba trăm chín mươi lăm phẩy mười bốn', 395.136, 2],
        ];
    }

    public function fractionDataProvider(): array
    {
        return [
            ['không', 0],
            ['âm không phẩy một', -0.1],
            ['không phẩy ba trăm bảy mươi tám nghìn bảy trăm năm mươi tám', 0.378758],
            ['không phẩy chín trăm hai mươi chín nghìn một trăm bảy mươi tư', 0.929174],
            ['không phẩy sáu trăm sáu mươi nghìn bảy trăm tám mươi tư', 0.660784],
            ['không phẩy hai mươi ba nghìn ba trăm chín mươi sáu', 0.233960],
            ['không phẩy năm mươi mốt nghìn hai trăm năm mươi tám', 0.512580],
            ['không phẩy một triệu không trăm chín mươi lăm nghìn hai trăm hai mươi sáu', 0.1095226],
            ['không phẩy một triệu không trăm chín mươi sáu nghìn không trăm linh bốn', 0.1096004],
            ['không phẩy mười ba nghìn ba trăm chín mươi mốt', 0.133910],
            ['không phẩy ba mươi mốt nghìn tám trăm bảy mươi sáu', 0.31876],
            ['không phẩy tám trăm năm mươi tám nghìn sáu trăm hai mươi hai', 0.858622],
            ['không phẩy bốn trăm tám mươi sáu nghìn ba trăm hai mươi lăm', 0.486325],
            ['không phẩy năm trăm ba mươi lăm nghìn sáu trăm sáu mươi sáu', 0.535666],
            ['không phẩy bảy trăm chín mươi ba nghìn một trăm sáu mươi lăm', 0.793165],
            ['không phẩy bốn trăm sáu mươi chín nghìn không trăm linh bốn', 0.469004],
            ['không phẩy chín trăm bảy mươi bảy nghìn hai trăm ba mươi sáu', 0.977236],
            ['không phẩy sáu mươi chín nghìn một trăm mười bảy', 0.69117],
            ['không phẩy một trăm chín mươi sáu nghìn hai trăm hai mươi lăm', 0.196225],
            ['không phẩy một trăm sáu mươi lăm nghìn chín trăm tám mươi sáu', 0.165986],
            ['không phẩy một triệu không trăm hai mươi hai nghìn sáu trăm chín mươi mốt', 0.1022691],
            ['không phẩy sáu mươi chín nghìn bảy trăm bốn mươi hai', 0.697420],
            ['ba trăm sáu mươi tư phẩy mười tám', 364.18],
            ['chín trăm linh năm phẩy ba trăm chín mươi hai', 905.392],
            ['hai trăm tám mươi ba phẩy ba trăm bảy mươi mốt', 283.371],
            ['hai trăm bảy mươi tám phẩy bốn trăm tám mươi sáu', 278.486],
            ['ba mươi hai phẩy bảy trăm sáu mươi chín', 32.769],
            ['bảy trăm linh hai phẩy một trăm bảy mươi bảy', 702.177],
            ['chín trăm hai mươi hai phẩy năm mươi sáu', 922.56],
            ['năm mươi lăm phẩy hai trăm chín mươi sáu', 55.296],
            ['sáu trăm sáu mươi ba phẩy ba trăm hai mươi tám', 663.328],
            ['bảy trăm hai mươi bảy phẩy sáu trăm linh năm', 727.605],
            ['năm trăm ba mươi ba phẩy chín trăm ba mươi bảy', 533.937],
            ['ba trăm năm mươi tư phẩy một trăm năm mươi sáu', 354.156],
            ['hai trăm hai mươi hai phẩy bảy trăm bảy mươi tám', 222.778],
            ['hai trăm linh năm phẩy năm trăm mười lăm', 205.515],
            ['tám trăm chín mươi phẩy sáu trăm sáu mươi tám', 890.668],
            ['sáu trăm mười bốn phẩy năm trăm hai mươi sáu', 614.526],
            ['một trăm tám mươi chín phẩy chín trăm hai mươi chín', 189.929],
            ['chín trăm linh bảy phẩy bốn trăm hai mươi bảy', 907.427],
            ['một trăm tám mươi tám phẩy bốn trăm hai mươi tư', 188.424],
            ['sáu trăm linh sáu phẩy ba trăm năm mươi ba', 606.353],
            ['hai trăm mười bảy phẩy bốn mươi bảy', 217.470],
            ['ba trăm bốn mươi tư phẩy sáu trăm ba mươi hai', 344.632],
            ['bốn trăm bảy mươi chín phẩy bốn mươi tám', 479.480],
            ['tám mươi sáu phẩy năm trăm bảy mươi sáu', 86.576],
            ['hai trăm năm mươi tám phẩy chín trăm bảy mươi tám', 258.978],
            ['ba trăm sáu mươi sáu phẩy hai trăm chín mươi tám', 366.298],
            ['bảy trăm sáu mươi hai phẩy ba trăm bảy mươi hai', 762.372],
            ['năm trăm bảy mươi ba phẩy năm mươi tám', 573.58],
            ['sáu trăm sáu mươi chín phẩy một trăm ba mươi lăm', 669.135],
            ['ba trăm chín mươi lăm phẩy một trăm ba mươi sáu', 395.136],
            ['sáu trăm hai mươi ba phẩy mười lăm', 623.150],
            ['sáu trăm hai mươi tám phẩy tám trăm bảy mươi bảy', 628.877],
            ['tám trăm tám mươi chín phẩy tám trăm hai mươi chín', 889.829],
            ['chín trăm năm mươi lăm phẩy hai trăm hai mươi tư', 955.224],
            ['sáu trăm linh hai phẩy bảy trăm năm mươi tư', 602.754],
            ['tám trăm bốn mươi chín phẩy bảy mươi ba', 849.73],
            ['tám trăm tám mươi bảy phẩy chín trăm tám mươi chín', 887.989],
            ['tám trăm bảy mươi tám phẩy sáu trăm mười bốn', 878.614],
            ['tám trăm mười bảy phẩy hai trăm mười hai', 817.212],
            ['ba trăm sáu mươi hai phẩy năm trăm chín mươi mốt', 362.591],
            ['bốn trăm mười bảy phẩy hai trăm ba mươi bảy', 417.237],
            ['bốn trăm linh năm phẩy bốn trăm linh bốn', 405.404],
            ['một trăm bảy mươi hai phẩy bảy trăm chín mươi sáu', 172.796],
            ['bốn trăm ba mươi mốt phẩy sáu trăm bảy mươi hai', 431.672],
            ['sáu trăm chín mươi chín phẩy bốn trăm ba mươi sáu', 699.436],
            ['hai trăm tám mươi ba phẩy tám trăm hai mươi tám', 283.828],
            ['sáu trăm sáu mươi tám phẩy năm trăm năm mươi hai', 668.552],
            ['hai trăm hai mươi lăm phẩy bốn mươi chín', 225.490],
            ['năm mươi phẩy bảy trăm chín mươi lăm', 50.795],
            ['tám trăm năm mươi tám phẩy bốn trăm linh sáu', 858.406],
            ['một trăm linh bảy phẩy bốn trăm linh một', 107.401],
            ['một trăm mười chín phẩy hai mươi sáu', 119.26],
            ['chín trăm năm mươi tư phẩy bảy trăm sáu mươi lăm', 954.765],
            ['ba trăm ba mươi lăm phẩy một trăm bảy mươi bảy', 335.177],
            ['năm trăm hai mươi ba phẩy bảy trăm sáu mươi mốt', 523.761],
            ['bảy mươi lăm phẩy tám trăm mười một', 75.811],
            ['bốn trăm mười sáu phẩy một', 416.100],
            ['tám mươi phẩy ba trăm ba mươi ba', 80.333],
            ['bốn trăm bảy mươi tư phẩy mười một', 474.110],
            ['chín trăm mười bảy phẩy mười lăm', 917.15],
            ['tám trăm bốn mươi sáu phẩy năm trăm hai mươi mốt', 846.521],
            ['bảy trăm sáu mươi ba phẩy năm trăm sáu mươi lăm', 763.565],
            ['chín trăm tám mươi bảy phẩy bảy trăm bảy mươi bảy', 987.777],
            ['bảy trăm năm mươi hai phẩy mười bốn', 752.140],
            ['một trăm năm mươi sáu phẩy năm trăm bốn mươi tư', 156.544],
            ['một trăm mười một phẩy hai trăm tám mươi chín', 111.289],
            ['tám trăm ba mươi lăm phẩy chín mươi mốt', 835.91],
            ['ba trăm mười bốn phẩy năm trăm ba mươi mốt', 314.531],
            ['mười ba phẩy sáu trăm ba mươi tư', 13.634],
            ['bốn trăm sáu mươi mốt phẩy năm trăm mười sáu', 461.516],
            ['bảy trăm sáu mươi chín phẩy chín mươi tám', 769.980],
            ['hai trăm tám mươi lăm phẩy năm trăm bốn mươi lăm', 285.545],
            ['bảy trăm chín mươi sáu phẩy bảy trăm bốn mươi tám', 796.748],
            ['ba trăm bảy mươi chín phẩy chín trăm chín mươi chín', 379.999],
            ['ba trăm mười ba phẩy ba trăm mười ba', 313.313],
            ['sáu trăm bảy mươi chín phẩy bảy trăm mười ba', 679.713],
            ['bảy mươi sáu phẩy năm trăm tám mươi tư', 76.584],
            ['chín trăm chín mươi tư phẩy bốn trăm tám mươi ba', 994.483],
            ['sáu trăm tám mươi lăm phẩy tám trăm bảy mươi bảy', 685.877],
            ['bảy trăm chín mươi chín phẩy một trăm linh sáu', 799.106],
            ['một trăm chín mươi chín phẩy hai trăm bảy mươi lăm', 199.275],
            ['sáu trăm hai mươi lăm phẩy mười hai', 625.120],
            ['bảy trăm bốn mươi ba phẩy tám trăm hai mươi chín', 743.829],
            ['sáu trăm bảy mươi ba phẩy hai trăm linh năm', 673.205],
            ['tám trăm sáu mươi ba phẩy ba trăm chín mươi chín', 863.399],
            ['một trăm bốn mươi sáu phẩy sáu trăm sáu mươi hai', 146.662],
            ['chín trăm ba mươi tư phẩy chín trăm sáu mươi tám', 934.968],
            ['tám trăm tám mươi tư phẩy ba trăm bốn mươi tám', 884.348],
            ['chín trăm năm mươi tư phẩy hai trăm chín mươi lăm', 954.295],
            ['năm trăm sáu mươi tư phẩy tám mươi tư', 564.840],
            ['bảy trăm bốn mươi ba phẩy chín trăm bốn mươi sáu', 743.946],
            ['ba trăm linh chín phẩy hai', 309.2],
            ['hai trăm sáu mươi tám phẩy ba trăm bảy mươi tư', 268.374],
            ['năm trăm năm mươi sáu phẩy bảy trăm bảy mươi mốt', 556.771],
            ['bảy trăm sáu mươi hai phẩy năm trăm bảy mươi sáu', 762.576],
            ['một trăm tám mươi chín phẩy chín trăm bảy mươi tư', 189.974],
            ['năm trăm ba mươi phẩy tám trăm ba mươi sáu', 530.836],
            ['năm mươi lăm phẩy mười chín', 55.190],
            ['hai trăm tám mươi chín phẩy sáu trăm ba mươi mốt', 289.631],
            ['năm trăm linh một phẩy bảy trăm mười bốn', 501.714],
        ];
    }

    public function minusDataProvider(): array
    {
        return [
            ['âm chín mươi chín', -99],
            ['âm chín mươi tám', -98],
            ['âm chín mươi bảy', -97],
            ['âm chín mươi sáu', -96],
            ['âm chín mươi lăm', -95],
            ['âm chín mươi tư', -94],
            ['âm chín mươi ba', -93],
            ['âm chín mươi hai', -92],
            ['âm chín mươi mốt', -91],
            ['âm chín mươi', -90],
            ['âm tám mươi chín', -89],
            ['âm tám mươi tám', -88],
            ['âm tám mươi bảy', -87],
            ['âm tám mươi sáu', -86],
            ['âm tám mươi lăm', -85],
            ['âm tám mươi tư', -84],
            ['âm tám mươi ba', -83],
            ['âm tám mươi hai', -82],
            ['âm tám mươi mốt', -81],
            ['âm tám mươi', -80],
            ['âm bảy mươi chín', -79],
            ['âm bảy mươi tám', -78],
            ['âm bảy mươi bảy', -77],
            ['âm bảy mươi sáu', -76],
            ['âm bảy mươi lăm', -75],
            ['âm bảy mươi tư', -74],
            ['âm bảy mươi ba', -73],
            ['âm bảy mươi hai', -72],
            ['âm bảy mươi mốt', -71],
            ['âm bảy mươi', -70],
            ['âm sáu mươi chín', -69],
            ['âm sáu mươi tám', -68],
            ['âm sáu mươi bảy', -67],
            ['âm sáu mươi sáu', -66],
            ['âm sáu mươi lăm', -65],
            ['âm sáu mươi tư', -64],
            ['âm sáu mươi ba', -63],
            ['âm sáu mươi hai', -62],
            ['âm sáu mươi mốt', -61],
            ['âm sáu mươi', -60],
            ['âm năm mươi chín', -59],
            ['âm năm mươi tám', -58],
            ['âm năm mươi bảy', -57],
            ['âm năm mươi sáu', -56],
            ['âm năm mươi lăm', -55],
            ['âm năm mươi tư', -54],
            ['âm năm mươi ba', -53],
            ['âm năm mươi hai', -52],
            ['âm năm mươi mốt', -51],
            ['âm năm mươi', -50],
            ['âm bốn mươi chín', -49],
            ['âm bốn mươi tám', -48],
            ['âm bốn mươi bảy', -47],
            ['âm bốn mươi sáu', -46],
            ['âm bốn mươi lăm', -45],
            ['âm bốn mươi tư', -44],
            ['âm bốn mươi ba', -43],
            ['âm bốn mươi hai', -42],
            ['âm bốn mươi mốt', -41],
            ['âm bốn mươi', -40],
            ['âm ba mươi chín', -39],
            ['âm ba mươi tám', -38],
            ['âm ba mươi bảy', -37],
            ['âm ba mươi sáu', -36],
            ['âm ba mươi lăm', -35],
            ['âm ba mươi tư', -34],
            ['âm ba mươi ba', -33],
            ['âm ba mươi hai', -32],
            ['âm ba mươi mốt', -31],
            ['âm ba mươi', -30],
            ['âm hai mươi chín', -29],
            ['âm hai mươi tám', -28],
            ['âm hai mươi bảy', -27],
            ['âm hai mươi sáu', -26],
            ['âm hai mươi lăm', -25],
            ['âm hai mươi tư', -24],
            ['âm hai mươi ba', -23],
            ['âm hai mươi hai', -22],
            ['âm hai mươi mốt', -21],
            ['âm hai mươi', -20],
            ['âm mười chín', -19],
            ['âm mười tám', -18],
            ['âm mười bảy', -17],
            ['âm mười sáu', -16],
            ['âm mười lăm', -15],
            ['âm mười bốn', -14],
            ['âm mười ba', -13],
            ['âm mười hai', -12],
            ['âm mười một', -11],
            ['âm mười', -10],
            ['âm chín', -9],
            ['âm tám', -8],
            ['âm bảy', -7],
            ['âm sáu', -6],
            ['âm năm', -5],
            ['âm bốn', -4],
            ['âm ba', -3],
            ['âm hai', -2],
            ['âm một', -1],
            ['không', 0],
        ];
    }

    public function dataProvider(): array
    {
        return [
            ['một nghìn', 1000],
            ['một nghìn không trăm linh một', 1001],
            ['một nghìn không trăm linh hai', 1002],
            ['một nghìn không trăm linh ba', 1003],
            ['một nghìn không trăm linh bốn', 1004],
            ['một nghìn không trăm linh năm', 1005],
            ['một nghìn không trăm linh sáu', 1006],
            ['một nghìn không trăm linh bảy', 1007],
            ['một nghìn không trăm linh tám', 1008],
            ['một nghìn không trăm linh chín', 1009],
            ['một nghìn không trăm mười', 1010],
            ['một nghìn không trăm mười một', 1011],
            ['một nghìn không trăm mười hai', 1012],
            ['một nghìn không trăm mười ba', 1013],
            ['một nghìn không trăm mười bốn', 1014],
            ['một nghìn không trăm mười lăm', 1015],
            ['một nghìn không trăm mười sáu', 1016],
            ['một nghìn không trăm mười bảy', 1017],
            ['một nghìn không trăm mười tám', 1018],
            ['một nghìn không trăm mười chín', 1019],
            ['một nghìn không trăm hai mươi', 1020],
            ['một nghìn không trăm hai mươi mốt', 1021],
            ['một nghìn không trăm hai mươi hai', 1022],
            ['một nghìn không trăm hai mươi ba', 1023],
            ['một nghìn không trăm hai mươi tư', 1024],
            ['một nghìn không trăm hai mươi lăm', 1025],
            ['một nghìn không trăm hai mươi sáu', 1026],
            ['một nghìn không trăm hai mươi bảy', 1027],
            ['một nghìn không trăm hai mươi tám', 1028],
            ['một nghìn không trăm hai mươi chín', 1029],
            ['một nghìn không trăm ba mươi', 1030],
            ['một nghìn không trăm ba mươi mốt', 1031],
            ['một nghìn không trăm ba mươi hai', 1032],
            ['một nghìn không trăm ba mươi ba', 1033],
            ['một nghìn không trăm ba mươi tư', 1034],
            ['một nghìn không trăm ba mươi lăm', 1035],
            ['một nghìn không trăm ba mươi sáu', 1036],
            ['một nghìn không trăm ba mươi bảy', 1037],
            ['một nghìn không trăm ba mươi tám', 1038],
            ['một nghìn không trăm ba mươi chín', 1039],
            ['một nghìn không trăm bốn mươi', 1040],
            ['một nghìn không trăm bốn mươi mốt', 1041],
            ['một nghìn không trăm bốn mươi hai', 1042],
            ['một nghìn không trăm bốn mươi ba', 1043],
            ['một nghìn không trăm bốn mươi tư', 1044],
            ['một nghìn không trăm bốn mươi lăm', 1045],
            ['một nghìn không trăm bốn mươi sáu', 1046],
            ['một nghìn không trăm bốn mươi bảy', 1047],
            ['một nghìn không trăm bốn mươi tám', 1048],
            ['một nghìn không trăm bốn mươi chín', 1049],
            ['một nghìn không trăm năm mươi', 1050],
            ['một nghìn không trăm năm mươi mốt', 1051],
            ['một nghìn không trăm năm mươi hai', 1052],
            ['một nghìn không trăm năm mươi ba', 1053],
            ['một nghìn không trăm năm mươi tư', 1054],
            ['một nghìn không trăm năm mươi lăm', 1055],
            ['một nghìn không trăm năm mươi sáu', 1056],
            ['một nghìn không trăm năm mươi bảy', 1057],
            ['một nghìn không trăm năm mươi tám', 1058],
            ['một nghìn không trăm năm mươi chín', 1059],
            ['một nghìn không trăm sáu mươi', 1060],
            ['một nghìn không trăm sáu mươi mốt', 1061],
            ['một nghìn không trăm sáu mươi hai', 1062],
            ['một nghìn không trăm sáu mươi ba', 1063],
            ['một nghìn không trăm sáu mươi tư', 1064],
            ['một nghìn không trăm sáu mươi lăm', 1065],
            ['một nghìn không trăm sáu mươi sáu', 1066],
            ['một nghìn không trăm sáu mươi bảy', 1067],
            ['một nghìn không trăm sáu mươi tám', 1068],
            ['một nghìn không trăm sáu mươi chín', 1069],
            ['một nghìn không trăm bảy mươi', 1070],
            ['một nghìn không trăm bảy mươi mốt', 1071],
            ['một nghìn không trăm bảy mươi hai', 1072],
            ['một nghìn không trăm bảy mươi ba', 1073],
            ['một nghìn không trăm bảy mươi tư', 1074],
            ['một nghìn không trăm bảy mươi lăm', 1075],
            ['một nghìn không trăm bảy mươi sáu', 1076],
            ['một nghìn không trăm bảy mươi bảy', 1077],
            ['một nghìn không trăm bảy mươi tám', 1078],
            ['một nghìn không trăm bảy mươi chín', 1079],
            ['một nghìn không trăm tám mươi', 1080],
            ['một nghìn không trăm tám mươi mốt', 1081],
            ['một nghìn không trăm tám mươi hai', 1082],
            ['một nghìn không trăm tám mươi ba', 1083],
            ['một nghìn không trăm tám mươi tư', 1084],
            ['một nghìn không trăm tám mươi lăm', 1085],
            ['một nghìn không trăm tám mươi sáu', 1086],
            ['một nghìn không trăm tám mươi bảy', 1087],
            ['một nghìn không trăm tám mươi tám', 1088],
            ['một nghìn không trăm tám mươi chín', 1089],
            ['một nghìn không trăm chín mươi', 1090],
            ['một nghìn không trăm chín mươi mốt', 1091],
            ['một nghìn không trăm chín mươi hai', 1092],
            ['một nghìn không trăm chín mươi ba', 1093],
            ['một nghìn không trăm chín mươi tư', 1094],
            ['một nghìn không trăm chín mươi lăm', 1095],
            ['một nghìn không trăm chín mươi sáu', 1096],
            ['một nghìn không trăm chín mươi bảy', 1097],
            ['một nghìn không trăm chín mươi tám', 1098],
            ['một nghìn không trăm chín mươi chín', 1099],
            ['một nghìn một trăm', 1100],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi', 131050030],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi mốt', 131050031],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi hai', 131050032],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi ba', 131050033],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi tư', 131050034],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi lăm', 131050035],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi sáu', 131050036],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi bảy', 131050037],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi tám', 131050038],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi chín', 131050039],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm bốn mươi', 131050040],
            ['chín trăm chín mươi chín triệu chín trăm chín mươi chín nghìn chín trăm chín mươi chín', 999999999],
            ['một tỷ không trăm bảy mươi', 1000000070],
            ['một tỷ không trăm bảy mươi mốt', 1000000071],
            ['một tỷ không trăm bảy mươi hai', 1000000072],
            ['một tỷ không trăm bảy mươi ba', 1000000073],
            ['một tỷ không trăm bảy mươi tư', 1000000074],
            ['một tỷ không trăm bảy mươi lăm', 1000000075],
            ['một tỷ không trăm bảy mươi sáu', 1000000076],
            ['một tỷ không trăm bảy mươi bảy', 1000000077],
            ['một tỷ không trăm bảy mươi tám', 1000000078],
            ['một tỷ không trăm bảy mươi chín', 1000000079],
        ];
    }
}
