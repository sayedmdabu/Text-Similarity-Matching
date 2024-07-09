<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentence;

class TextSimilarityController extends Controller
{
    public function compare_1(Request $request)
    {
        $userText = $request->input('user_text');
        $sentences = Sentence::all();

        $results = [];

        foreach ($sentences as $sentence) {
            $similarity = $this->calculateSimilarity($userText, $sentence->sentence);
            $results[] = [
                'sentence' => $sentence->sentence,
                'similarity' => $similarity,
            ];
        }

        // You can sort the results by similarity if you want
        usort($results, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        return view('results', compact('results'));
    }

    private function calculateSimilarity_1($text1, $text2)
    {
        // Implement a text similarity algorithm here
        // For simplicity, let's use the Levenshtein distance as an example

        $levenshteinDistance = levenshtein($text1, $text2);
        $maxLength = max(strlen($text1), strlen($text2));

        return 1 - ($levenshteinDistance / $maxLength);
    }


    public function compare_2(Request $request)
    {
        $userText = $request->input('user_text');
        $sentences = Sentence::all();

        $results = [];

        foreach ($sentences as $sentence) {
            $similarity = $this->calculateSimilarity($userText, $sentence->sentence);
            if ($similarity == 1.0) { // Only consider 100% matches
                $results[] = [
                    'sentence' => $sentence->sentence,
                    'similarity' => $similarity,
                ];
            }
        }

        return view('results', compact('results'));
    }

    private function calculateSimilarity_2($text1, $text2)
    {
        // Implement a text similarity algorithm here
        // For simplicity, let's use the Levenshtein distance as an example

        $levenshteinDistance = levenshtein($text1, $text2);
        $maxLength = max(strlen($text1), strlen($text2));

        return 1 - ($levenshteinDistance / $maxLength);
    }


    public function compare(Request $request)
    {
        $userText = $request->input('user_text');
        $sentences = Sentence::all();

        $maxSimilarity = 0;
        $bestMatch = null;

        foreach ($sentences as $sentence) {
            $similarity = $this->calculateSimilarity($userText, $sentence->sentence);
            if ($similarity > $maxSimilarity) {
                $maxSimilarity = $similarity;
                $bestMatch = $sentence->sentence;
            }
        }

        return view('results', compact('maxSimilarity', 'bestMatch'));
    }

    private function calculateSimilarity($text1, $text2)
    {
        // Implement a text similarity algorithm here
        // For simplicity, let's use the Levenshtein distance as an example

        $levenshteinDistance = levenshtein($text1, $text2);
        $maxLength = max(strlen($text1), strlen($text2));

        return 1 - ($levenshteinDistance / $maxLength);
    }
}
