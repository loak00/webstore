<?php namespace App\Libraries;

class Util {

  /**
   * Muuntaa tietokannassa olevan päiväyksen suomalaiseen muotoon.
   * 
   * @param date $date Tietokannasta luettu päiväys.
   * @return string Päiväys suomalaisessa muodossa.
   */
  public static function sqlDateToFi($date) {
    return date('d.m.Y H.i',strtotime($date));
  }
}