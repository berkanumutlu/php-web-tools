<?php
require_once '../vendor/autoload.php';

if (!empty($_POST['ping_form'])) {
    $response = new \App\Library\Response();
    if (empty(trim($_POST['hostname'])) || empty(trim($_POST['ttl'])) || empty(trim($_POST['timeout']))) {
        $response->setMessage('Please fill in the required fields.');
    } else {
        try {
            $hostname = !empty(trim($_POST["hostname"])) ? trim($_POST["hostname"]) : null;
            $ttl = !empty(trim($_POST["ttl"])) ? trim($_POST["ttl"]) : null;
            $timeout = !empty(trim($_POST["timeout"])) ? trim($_POST["timeout"]) : null;
            $web_tool = new \App\Library\WebTools();
            $web_tool->setHost($hostname);
            $web_tool->setTtl($ttl);
            $web_tool->setTimeout($timeout);
            if (!empty(trim($_POST["parameters"]))) {
                $web_tool->setCustomCommands(trim($_POST["parameters"]));
            }
            $latency = $web_tool->ping();
            if ($latency !== false) {
                $response->setMessage('Latency is '.$latency.' ms');
                if (!empty($web_tool->getCommandOutput())) {
                    $response->setData(str_replace('\n', '<br>', $web_tool->getCommandOutput()));
                }
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
if (!empty($_POST['nslookup_form'])) {
    $response = new \App\Library\Response();
    if (empty(trim($_POST['hostname']))) {
        $response->setMessage('Please fill in the required fields.');
    } else {
        try {
            $hostname = !empty($_POST["hostname"]) ? trim($_POST["hostname"]) : null;
            $ttl = !empty($_POST["ttl"]) ? trim($_POST["ttl"]) : null;
            $timeout = !empty($_POST["timeout"]) ? trim($_POST["timeout"]) : null;
            $web_tool = new \App\Library\WebTools();
            $web_tool->setHost($hostname);
            $web_tool->setTtl($ttl);
            $web_tool->setTimeout($timeout);
            if (!empty($_POST["port"])) {
                $web_tool->setPort(intval($_POST["port"]));
            }
            if (!empty($_POST["parameters"])) {
                $web_tool->setCustomCommands(trim($_POST["parameters"]));
            }
            $nslookup = $web_tool->nslookup();
            if (!empty($nslookup)) {
                $message = 'Addresses: ';
                if (is_array($nslookup)) {
                    foreach ($nslookup as $ns) {
                        $message .= $ns.'<br>';
                    }
                } else {
                    $message .= $nslookup;
                }
                $response->setMessage($message);
                if (!empty($web_tool->getCommandOutput())) {
                    $response->setData(str_replace('\n', '<br>', $web_tool->getCommandOutput()));
                }
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
if (!empty($_POST['tracert_form'])) {
    $response = new \App\Library\Response();
    if (empty(trim($_POST['hostname']))) {
        $response->setMessage('Please fill in the required fields.');
    } else {
        try {
            $hostname = !empty($_POST["hostname"]) ? trim($_POST["hostname"]) : null;
            $web_tool = new \App\Library\WebTools();
            $web_tool->setHost($hostname);
            if (!empty($_POST["parameters"])) {
                $web_tool->setCustomCommands(trim($_POST["parameters"]));
            }
            $tracert = $web_tool->tracert();
            if (!empty($tracert)) {
                $response->setMessage($tracert);
                if (!empty($web_tool->getCommandOutput())) {
                    $response->setData(str_replace('\n', '<br>', $web_tool->getCommandOutput()));
                }
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