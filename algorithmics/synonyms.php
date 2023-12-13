<?php

class Thesaurus {

    private $thesaurus;

    public function __construct(array $thesaurus) {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms(string $word): string {
        $array = array("word" => "", "synonyms" => array());

        foreach ($this->thesaurus as $key => $synonyms) {
            $array['word'] = $word;
            if ($key == $word) {
                foreach ($synonyms as $synonym) {
                    $array['synonyms'][] = $synonym;
                }
            }
        }
        
        return json_encode($array);
    }

}

$thesaurus = new Thesaurus(
    [
        "buy" => array("purchase"),
        "big" => array("great", "large")
    ]
);

echo $thesaurus->getSynonyms("big");
echo "\n";
echo $thesaurus->getSynonyms("agelast");

