<?php
    class Stats{
        public function __construct($db) {
            $this->db = $db;

            $this->track = false;

            $this->cookiename = 'usercookie';
            $this->sessionName = 'usersession';
            $this->logFile = 'stats.txt';
            $this->cookieDuration = 60*60; //one day
        }
        public function record(){
          if($this->track){
            //DATA RECORD ARRAY
          $data = array();

          //BROWSER INFO
          $b = $this->getBrowser();
          $data['broserName'] = $b['name'];
          $data['broserVersion'] = $b['version'];

          //MOBILE/DESKTOP
          $data['mobile'] = $this->isMobile();

         
          //CHECK IF FIRST VISIT
          if(isset($_COOKIE[$this->cookiename])){
            //NOT FIRST VISIT
            $data['unique'] = 0;
            //SET VISIT NUMBER
            $newVisits = intval($_COOKIE[$this->cookiename])+1;
            setcookie($this->cookiename,strval($newVisits),time()+$this->cookieDuration);

          }else{
            //FIRST VISIT
            $data['unique'] = 1;
            //GET IP INFO
            $ipInfo = unserialize(file_get_contents("http://ip-api.com/php/213.81.220.172?fields=status,continent,country,regionName,lat,lon,query"));
            //$ip = unserialize(file_get_contents("http://ip-api.com/php/".IP."?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query"));
            $data['ip'] = array(
              'continent'=>$ipInfo['continent'],
              'country'=>$ipInfo['country'],
              'region'=>$ipInfo['regionName'],
              'pos'=>array(
                'lat'=>$ipInfo['lat'],
                'lon'=>$ipInfo['lon']
              )
            );
            setcookie($this->cookiename,'1',time()+$this->cookieDuration);
          }

          //ADD RECORD TO FILE
          $rec = 0;
          if(file_exists($this->logFile)){
            //APPEND TO FILE
            $rec = fopen($this->logFile,'a');
          }else{
            //CREATE FILE
            $rec = fopen($this->logFile,'w');
          }

          fwrite($rec, json_encode($data));
          fwrite($rec,"\n");
          fclose($rec);
          }
          
        }
        public function get(){
          $r = array(
            'browsers'=>array(),
            'continents'=>array(),
            'country'=>array(),
            'unique'=>0,
            'total'=>0,
            'mobile'=>0
          );
          //READ FILE
          $file = fopen($this->logFile,'r');
          while(!feof($file)) {
            $line = json_decode(fgets($file),true);
            
            //TOTAL VISITS
            $r['total']++;

            //UNIQUE VISITS
            if($line['unique'] == 1){
              $r['unique']++;
            }

            //MOBILE VISITS
            if($line['mobile'] == 1){
              $r['mobile']++;
            }

            //BROWSERS
            if($line['broserName']){
              if(isset($r['browsers'][$line['broserName']])){
                $r['browsers'][$line['broserName']]++;
              }else{
                $r['browsers'][$line['broserName']] = 1;
              }
            }

            //CONTINENT
            if(isset($line['ip']['continent'])){
              if(isset($r['continents'][$line['ip']['continent']])){
                $r['continents'][$line['ip']['continent']]++;
              }else{
                $r['continents'][$line['ip']['continent']] = 1;
              }
            }

            //COUNTRY
            if(isset($line['ip']['country'])){
              if(isset($r['country'][$line['ip']['country']])){
                $r['country'][$line['ip']['country']]++;
              }else{
                $r['country'][$line['ip']['country']] = 1;
              }
            }


          }



          fclose($file);

          return $r;
        }

        //EXTRACT BROWSER INFO
        public function getBrowser(){
            $browser = array(
                'version'   => '0.0.0',
                'majorver'  => 0,
                'minorver'  => 0,
                'build'     => 0,
                'name'      => 'unknown',
                'useragent' => ''
              );
            
              $browsers = array(
                'firefox', 'msie', 'opera', 'chrome', 'safari', 'mozilla', 'seamonkey', 'konqueror', 'netscape',
                'gecko', 'navigator', 'mosaic', 'lynx', 'amaya', 'omniweb', 'avant', 'camino', 'flock', 'aol'
              );
            
              if (isset($_SERVER['HTTP_USER_AGENT'])) {
                $browser['useragent'] = $_SERVER['HTTP_USER_AGENT'];
                $user_agent = strtolower($browser['useragent']);
                foreach($browsers as $_browser) {
                  if (preg_match("/($_browser)[\/ ]?([0-9.]*)/", $user_agent, $match)) {
                    $browser['name'] = $match[1];
                    $browser['version'] = $match[2];
                    @list($browser['majorver'], $browser['minorver'], $browser['build']) = explode('.', $browser['version']);
                    break;
                  }
                }
              }
              return $browser;
        }

        //CHECK IF USING MOBILE PHONE
        public function isMobile() {
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }
        
    }
?>