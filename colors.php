<p>Github color identifier based on <a href="https://graphicdesign.stackexchange.com/a/92987/134191"> this stackexchange post</a> with github colors from <a href="https://github.com/github/linguist/pull/4568#issuecomment-513739638">this post</a> on 2019-07-22:</p>

<?php

function distance_3d($rgb_1, $rgb_2) {
  return round(sqrt(pow($rgb_1[0] - $rgb_2[0], 2) +
              pow($rgb_1[1] - $rgb_2[1], 2) +
              pow($rgb_1[2] - $rgb_2[2], 2)));
}

if (isset($_POST["hexcode"])) {
  $hexcode = $_POST["hexcode"];
  $r = hexdec(substr($hexcode, 0, 2));
  $g = hexdec(substr($hexcode, 2, 2));
  $b = hexdec(substr($hexcode, 4, 2));
  $rgb = [$r, $g, $b];

  $basic_colors = [
    'black' => [0, 0, 0],
    'white' => [255, 255, 255],
    'red' => [255, 0, 0],
    'orange' => [255, 128, 0],
    'yellow' => [255, 255, 0],
    'chartreuse' => [128, 255, 0],
    'green' => [0, 255, 0],
    'spring green' => [0, 255, 128],
    'cyan' => [0, 255, 255],
    'azure' => [0, 128, 255],
    'blue' => [0, 0, 255],

    'brackethighlighter.angle' => [hexdec("58"), hexdec("60"), hexdec("69")],
    'brackethighlighter.curly' => [hexdec("58"), hexdec("60"), hexdec("69")],
    'brackethighlighter.quote' => [hexdec("58"), hexdec("60"), hexdec("69")],
    'brackethighlighter.round' => [hexdec("58"), hexdec("60"), hexdec("69")],
    'brackethighlighter.square' => [hexdec("58"), hexdec("60"), hexdec("69")],
    'brackethighlighter.tag' => [hexdec("58"), hexdec("60"), hexdec("69")],
    'brackethighlighter.unmatched' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'carriage-return' => [hexdec("FA"), hexdec("FB"), hexdec("FC")],
    'comment' => [hexdec("6A"), hexdec("73"), hexdec("7D")],
    'constant' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'constant.character.escape' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'constant.other.reference.link' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'entity' => [hexdec("6F"), hexdec("42"), hexdec("C1")],
    'entity.name' => [hexdec("6F"), hexdec("42"), hexdec("C1")],
    'entity.name.constant' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'entity.name.tag' => [hexdec("22"), hexdec("86"), hexdec("3A")],
    'invalid.broken' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'invalid.deprecated' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'invalid.illegal' => [hexdec("FA"), hexdec("FB"), hexdec("FC")],
    'invalid.unimplemented' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'keyword' => [hexdec("D7"), hexdec("3A"), hexdec("49")],
    'markup.bold' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'markup.changed' => [hexdec("E3"), hexdec("62"), hexdec("09")],
    'markup.deleted' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'markup.heading' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'markup.ignored' => [hexdec("F6"), hexdec("F8"), hexdec("FA")],
    'markup.inserted' => [hexdec("22"), hexdec("86"), hexdec("3A")],
    'markup.italic' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'markup.list' => [hexdec("73"), hexdec("5C"), hexdec("0F")],
    'markup.quote' => [hexdec("22"), hexdec("86"), hexdec("3A")],
    'markup.raw' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'markup.untracked' => [hexdec("F6"), hexdec("F8"), hexdec("FA")],
    'message.error' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'meta.diff.header' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'meta.diff.header.from-file' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'meta.diff.header.to-file' => [hexdec("22"), hexdec("86"), hexdec("3A")],
    'meta.diff.range' => [hexdec("6F"), hexdec("42"), hexdec("C1")],
    'meta.module-reference' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'meta.output' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'meta.property-name' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'meta.separator' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'punctuation.definition.changed' => [hexdec("E3"), hexdec("62"), hexdec("09")],
    'punctuation.definition.comment' => [hexdec("6A"), hexdec("73"), hexdec("7D")],
    'punctuation.definition.deleted' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'punctuation.definition.inserted' => [hexdec("22"), hexdec("86"), hexdec("3A")],
    'punctuation.definition.string' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'punctuation.section.embedded' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'source' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'source.regexp' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'source.ruby.embedded' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'storage' => [hexdec("D7"), hexdec("3A"), hexdec("49")],
    'storage.modifier.import' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'storage.modifier.package' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'storage.type' => [hexdec("D7"), hexdec("3A"), hexdec("49")],
    'storage.type.java' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'string' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'string.comment' => [hexdec("6A"), hexdec("73"), hexdec("7D")],
    'string.other.link' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'string.regexp' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'string.regexp.arbitrary-repitition' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'string.regexp.character-class' => [hexdec("03"), hexdec("2F"), hexdec("62")],
    'sublimelinter.gutter-mark' => [hexdec("95"), hexdec("9D"), hexdec("A5")],
    'sublimelinter.mark.error' => [hexdec("B3"), hexdec("1D"), hexdec("28")],
    'sublimelinter.mark.warning' => [hexdec("E3"), hexdec("62"), hexdec("09")],
    'support' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'support.constant' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'support.variable' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'variable' => [hexdec("E3"), hexdec("62"), hexdec("09")],
    'variable.language' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'variable.other' => [hexdec("24"), hexdec("29"), hexdec("2E")],
    'variable.other.constant' => [hexdec("00"), hexdec("5C"), hexdec("C5")],
    'variable.parameter.function' => [hexdec("24"), hexdec("29"), hexdec("2E")],
  ];

  foreach ($basic_colors as $color_name => $color_rgb) {
    $basic_colors[$color_name] = distance_3d($rgb, $color_rgb);
  }
  asort($basic_colors);
  foreach ($basic_colors as $color_name => $color_rgb) {
    echo "<p>$color_name: " . $color_rgb . "</p>";
  }

} else {
?>

<form action="colors.php" method="post">
<p>Hex code: <input type="text" name="hexcode" /><br />
<p><input type="submit" value="Find Scope"></p>
</form>

<?php

}
