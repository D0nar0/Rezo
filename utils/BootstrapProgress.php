<?php
class BootstrapProgress
{
    private $value;
    private $options;

    public function __construct()
    {

    }

    public function BarreProgress($value, $options = [])
    {
        // Gestion de la couleur
		$color = $this->options['color'] ?? DANGER; 
		
		// Class par défaut
		$class = 'progress-bar bg-' . $color . ' ';
		
		// Classes supplémentaires
		$class .= $this->options['class'] ?? '';

        return '<div class="progress">
        <div class="' . $class . '" role="progressbar" style="width:' . $value . '%;" aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100">' . $value . '</div>
      </div>';
    }
}

