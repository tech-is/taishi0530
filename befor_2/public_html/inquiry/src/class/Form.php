<?php

/* フォームヘルパー */

class Form {

  public function checkConfig($config, $validator) {
    $errors = array();

    if (empty($config->sender)) {
      $errors[] = 'senderが未設定です。';
    }

    if (empty($config->mailto)) {
      $errors[] = 'mailtoが未設定です。';
    } else if (!$validator->chkEmail($config->mailto)) {
      $errors[] = 'mailtoが正しいメールアドレスではありません。';
    }

    if (empty($config->mailfrom)) {
      $errors[] = 'mailfromが未設定です。';
    } else if (!$validator->chkEmail($config->mailfrom)) {
      $errors[] = 'mailfromが正しいメールアドレスではありません。';
    }

    $perm = substr(sprintf('%o', fileperms(PATH_SESSION)), -4);
    if ($perm != '0606' && $perm != '0755') {
      $errors[] = 'private/sessionのパーミッションが間違っています。';
    }

    return $errors;
  }

  public function build($type, $name, $options = array()) {
    switch ($type) {
      // case 'text':
      //   return $this->buildInputText($options);
      //   break;

      // case 'tel':
      //   return $this->buildInputTel($options);
      //   break;

      // case 'email':
      //   return $this->buildInputEmail($options);
      //   break;

      case 'checkbox':
        return $this->buildCheckbox($name, $options);
        break;

      case 'radio':
        return $this->buildRadioButton($name, $options);
        break;

      case 'select':
        return $this->buildSelectbox($name, $options);
        break;

      case 'textarea':
        return $this->buildTextarea($name, $options);
        break;

      default:
        return $this->buildInput($type, $name, $options);
        break;
    }
  }

  public function showLabel($label, $required) {
    if ($required) {
      $label .= ' <span class="required">※必須</span>';
    }
    return $label;
  }

  private function buildInput($type, $name, $options) {
    $input = '';

    if (!empty($options->before) || !empty($options->after)) {
      $input .= '<label>';
    }
    if (!empty($options->before)) {
      $input .= $options->before . ' ';
    }

    $input .= '<input type="'. $type .'" name="'. $name .'"';
    if (!empty($options->required)) {
      $input .= ' required';
    }
    if (!empty($options->disabled)) {
      $input .= ' disabled';
    }
    if (!empty($options->placeholder)) {
      $input .= ' placeholder="' . $options->placeholder . '"';
    }
    if (!empty($options->class)) {
      $input .= ' class="' . $options->class . '"';
    }
    if ($type == 'number' && isset($options->min) && is_int($options->min)) {
      $input .= ' min="' . $options->min . '"';
    }
    if ($type == 'number' && isset($options->max) && is_int($options->max)) {
      $input .= ' max="' . $options->max . '"';
    }
    if (isset($options->value)) {
      $input .= ' value="' . $options->value . '"';
    }
    $input .= '>';

    if (!empty($options->after)) {
      $input .= ' ' . $options->after;
    }
    if (!empty($options->before) || !empty($options->after)) {
      $input .= '</label>';
    }

    if (!empty($options->note)) {
      $input .= '<br>' . $options->note;
    }
    return $input;
  }

  private function buildTextarea($name, $options) {
    $input = '<textarea name="'. $name .'"';
    if (!empty($options->required)) {
      $input .= ' required';
    }
    if (!empty($options->disabled)) {
      $input .= ' disabled';
    }
    if (!empty($options->placeholder)) {
      $input .= ' placeholder="' . $options->placeholder .  '"';
    }
    $rows = (!empty($options->rows))? $options->rows : 6;
    $input .= ' rows="' . $rows .  '"';
    $input .= '>';
    if (!empty($options->value)) {
      $input .= $options->value;
    }
    $input .= '</textarea>';
    if (!empty($options->note)) {
      $input .= '<br>' . $options->note;
    }
    return $input;
  }

  private function buildSelectbox($name, $options) {
    $input = '<select name="'. $name .'"';
    if (!empty($options->required)) {
      $input .= ' required';
    }
    if (!empty($options->disabled)) {
      $input .= ' disabled';
    }
    $input .= '>';

    if (!empty($options->default)) {
      $input .= '<option value="">' . $options->default . '</option>';
    }
    for ($i = 0; $i < count($options->items); $i++) {
      $value = $options->items[$i];
      $selected = (!empty($options->value) && $options->value == $value)? ' selected' : '';
      $input .= '<option value="' . $value . '"' . $selected . '>' . $value . '</option>';
    }

    $input .= '</select>';
    if (!empty($options->note)) {
      $input .= '<br>' . $options->note;
    }
    return $input;
  }

  private function buildRadioButton($name, $options) {
    if (empty($options->items) || !is_array($options->items)) {
      return '';
    }
    $input = '';
    for ($i = 0; $i < count($options->items) ; $i++) {
      $value = $options->items[$i];
      $input .= '<label><input type="radio" name="'. $name .'" value="'. $value .'"';
      if (!empty($options->required)) {
        $input .= ' required';
      }
      if (!empty($options->disabled)) {
        $input .= ' disabled';
      }
      $checked = (!empty($options->value) && $options->value == $value)? ' checked' : '';
      $input .= $checked .'> '. $value .'</label>';
    }
    return $input;
  }

  private function buildCheckbox($name, $options) {
    if (empty($options->items) || !is_array($options->items)) {
      return '';
    }
    $input = '';
    for ($i = 0; $i < count($options->items) ; $i++) {
      $value = $options->items[$i];
      $input .= '<label><input type="checkbox" name="'. $name .'[]" value="'. $value .'"';
      if (!empty($options->disabled)) {
        $input .= ' disabled';
      }
      $checked = (!empty($options->value) && in_array($value, $options->value))? ' checked' : '';
      $input .= $checked .'> '. $value .'</label>';
    }
    return $input;
  }

}