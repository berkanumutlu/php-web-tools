<?php
require_once '../vendor/autoload.php';

if (!empty($_POST['ping_form'])) {
    $response = new \App\Library\Response();
    if (empty(trim($_POST['hostname'])) || empty(trim($_POST['ttl'])) || empty(trim($_POST['timeout']))) {
        $response->setMessage('Please fill in the required fields.');
    } else {
        try {
            $ping = new \App\Library\Ping(trim($_POST["hostname"]), trim($_POST["ttl"]), trim($_POST["timeout"]));
            if (!empty(trim($_POST["parameters"]))) {
                $ping->setCustomCommands(trim($_POST["parameters"]));
            }
            $latency = $ping->ping();
            if ($latency !== false) {
                $response->setMessage('Latency is '.$latency.' ms');
                $response->setData(str_replace('\n', '<br>', $ping->getCommandOutput()));
                $response->setStatus(true);
            } else {
                $response->setMessage('Host could not be reached.');
                $response->setStatus(false);
            }
        } catch (\Exception $e) {
            $response->setMessage($e->getMessage());
        }
    }
    echo $response->toJson();
    return true;
}