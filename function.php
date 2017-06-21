<?php

//下载远程图片

function downloadImage($url, $path='images/')
{
    $ch = curl_init(); //curl_init(): 初始化一个新的会话，返回一个cURL句柄，供curl_setopt(), curl_exec()和curl_close() 函数使用。 
    
    curl_setopt($ch, CURLOPT_URL, $url);//curl_setopt(): 设置一个cURL传输选项,

    //CURLOPT_URL: 需要获取的 URL 地址，也可以在curl_init() 初始化会话的时候。 
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //CURLOPT_RETURNTRANSFER: TRUE将curl_exec()获取的信息以字符串返回，而不是直接输出。
    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);//CURLOPT_CONNECTTIMEOUT: 在尝试连接时等待的秒数。设置为0，则无限等待。 
    
    $file = curl_exec($ch);//curl_exec(): 执行一个cURL会话
    
    curl_close($ch);//curl_close(): 关闭一个cURL会话
    
    saveAsImage($url, $file, $path);
}

function saveAsImage($url, $file, $path)
{
    $filename = pathinfo($url, PATHINFO_BASENAME);//pathinfo(): 返回文件路径的信息
    
    $resource = fopen($path . $filename, 'a');//fopen(): 打开文件或url
    
    fwrite($resource, $file);//fwrite(): 写入文件
    
    fclose($resource);//fclose(): 关闭一个已经打开的文件指针
}
