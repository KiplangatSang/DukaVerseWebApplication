$curl = curl_init();
$search_string = "movies 2015";
$url="https://www.amazon.com/s/field-keywords=$search_string";

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,$url);

//https://m.media-amazon.com/images/I/71wz25bGt8L._AC_UY218_.jpg

$result = curl_exec($curl);

preg_match_all("https://m.media-amazon.com/images/I/[^\s]*?._AC_UY218_.jpg",$result,$matches);

$images= array_values(array_unique($matches[0]));

foreach($images as image){

}
curl_close($curl);
