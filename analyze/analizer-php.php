<?php

class ImageAnalyzer
{
    private $tesseractPath;
    private $db;

    public function __construct($tesseractPath,$db)
    {
        $this->tesseractPath = $tesseractPath;
        $this->db = $db;
    }

    public function analyzeImage($imagePath)
    {
        // Check if the image file exists
        if (!file_exists($imagePath)) {
            echo "Image file not found!";
            return;
        }

        // Prepare the command to execute Tesseract OCR
        $command = "{$this->tesseractPath} {$imagePath} stdout";

        // Execute the command and capture the output
        $output = shell_exec($command);

        // Extracted text from the image
        $extractedText = trim($output);

        // Define emotions array
        $emotions = [
            1 => 'Happy',
            2 => 'Sad',
            3 => 'Angry',
            // Add more emotions as needed
        ];

        // Map emotions to profile and post tables
        $emotionId = 0; // Initialize the emotion ID
        foreach ($emotions as $id => $emotion) {
            if (stripos($extractedText, $emotion) !== false) {
                $emotionId = $id;
                break;
            }
        }

        // Save the emotion ID to profile and post tables
        if ($emotionId > 0) {
            // Update the profile table with the emotion ID
            $profileId = 123; // Example profile ID
            $profile = Profile::find($profileId); // Example Profile model
            $profile->emotion_id = $emotionId;
            $profile->save();

            // Update the post table with the emotion ID
            $postId = 456; // Example post ID
            $post = Post::find($postId); // Example Post model
            $post->emotion_id = $emotionId;
            $post->save();
        }
    }
}


// Usage
require_once "../../config/config.php";
$Database = Database::getInstance();

$sql = "select id from post order by id desc";

$imagePath = "../postimg/42.jpg";
// echo $imagePath;
$tesseractPath = "C:/Program Files/Tesseract-OCR/tesseract.exe";

$imageAnalyzer = new ImageAnalyzer($tesseractPath,$Database);
$imageAnalyzer->analyzeImage($imagePath);