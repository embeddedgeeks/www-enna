<?php

/**
 * Copyright Enna Team
 *
 * Handle Squeezeplay config
 * How to use:
 *
 * $c = new SqueezeplayConfig();
 * $value = $c−>getServerInfo('ip');
 * $c->setPlayerName("test");
 * $c->commitChanges();
 */

if (!defined('ENNA_WWW')) define('ENNA_WWW', 1);
include_once('common.php');
if (!defined('PAGE_NAV')) define('PAGE_NAV', 0);
require_once('ConfigParser.php');

define('SQUEEZEPLAY_PLAYBACK_CONFIG', 'settings = {enableAudio=1,squeezeNetwork=false,serverUuid="%s",powerState="on",volume=40,serverInit={%sip="%s",},serverName="%s",playerInit={name="%s",model="squeezeplay",},captureVolume=40,}');

class SqueezeplayConfig
{
        protected $playerName = "";
        protected $serverInfos = array();

        public function __construct()
        {
                global $config;

                $filename = $config['sq_config_path'] . $config['sq_playback_file'];
                try
                {
                        if (!is_readable($filename))
                                throw new Exception('File not found');
                        $luaconf = file_get_contents($filename);
                        //Clean file
                        $luaconf = str_replace(array("\r\n", "\n", "\r"), "", $luaconf);
                        //reformat lua config with newlines
                        $luaconf = str_replace(array("{", ","), array("{\n", ",\n"), $luaconf);

                        $parser = new ConfigParser($luaconf);
                        $c = $parser->toArray();

                        $this->playerName = $c['settings']['playerInit']['name'];
                        $this->serverInfos['uuid'] = $c['settings']['serverUuid'];
                        if (array_key_exists('mac', $c['settings']['serverInit']))
                                $this->serverInfos['mac'] = $c['settings']['serverInit']['mac'];
                        $this->serverInfos['ip'] = $c['settings']['serverInit']['ip'];
                        $this->serverInfos['name'] = $c['settings']['serverName'];
                }
                catch (Exception $e)
                {
                        //Can't parse lua config, reset it
                        @unlink($filename);
                        $this->serverInfos['uuid'] = "Unknown";
                        $this->serverInfos['ip'] = "None";
                        $this->serverInfos['name'] = "None";
                }

                //Write setupdone into lua config to tell squeezeplay setup is done and don't bother with that
                $filename = $config['sq_config_path'] . $config['sq_welcome_file'];
                if (is_writable($filename))
                {
                        $fp = fopen($filename, 'w');
                        fwrite($fp, 'settings = {setupDone=true,}');
                        fclose($fp);
                }
        }

        public function commitChanges()
        {
                global $config;

                //write changes to config file
                $mac = "";
                if (array_key_exists('mac', $this->serverInfos))
                        $mac = sprintf("mac=\"%s\",\n", $this->serverInfos['mac']);
                $conf = sprintf(SQUEEZEPLAY_PLAYBACK_CONFIG, $this->serverInfos['uuid'],
                                                             $mac,
                                                             $this->serverInfos['ip'],
                                                             $this->serverInfos['name'],
                                                             $this->playerName);

                $filename = $config['sq_config_path'] . $config['sq_playback_file'];
                if (is_writable($filename))
                {
                        $fp = fopen($filename, 'w');
                        fwrite($fp, $conf);
                        fclose($fp);

                        return true;
                }

                return false;
        }

        public function setPlayerName($name)
        {
                $this->playerName = $name;
        }

        public function getPlayerName()
        {
                return $this->playerName;
        }

        public function setServerInfo($info, $value)
        {
                $this->serverInfos[$info] = $value;
        }

        public function getServerInfo($info)
        {
                if (!array_key_exists($info, $this->serverInfos))
                        return false;

                return $this->serverInfos[$info];
        }

        public function getServerInfoAll()
        {
                return $this->serverInfos;
        }
}

/*
$a = new SqueezeplayConfig();
print_r($a->getPlayerName());
print("\n");
print_r($a->getServerInfoAll());
*/

?>