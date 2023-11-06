<?php
require 'aws/aws-autoloader.php'; // Include the AWS SDK for PHP

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucketName = 'your-bucket-name';
$awsAccessKeyId = 'your-access-key';
$awsSecretAccessKey = 'your-secret-key';
$awsRegion = 'your-region';

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];

    // Initialize an S3 client
    $s3 = new S3Client([
        'version' => 'latest',
        'region' => $awsRegion,
        'credentials' => [
            'key' => $awsAccessKeyId,
            'secret' => $awsSecretAccessKey,
        ],
    ]);

    // Specify the S3 object key and upload the file
    $objectKey = 'uploads/' . $fileName;

    try {
        $result = $s3->putObject([
            'Bucket' => $bucketName,
            'Key' => $objectKey,
            'Body' => fopen($tmpName, 'rb'),
            'ACL' => 'public-read',
        ]);

        echo "File uploaded successfully. You can access it at: " . $result['ObjectURL'];
    } catch (S3Exception $e) {
        echo "Error uploading file: " . $e->getMessage();
    }
}
