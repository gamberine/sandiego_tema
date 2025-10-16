<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> id="top" class="user-select-none">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#220F04">
  <meta name="theme-color" media="(prefers-color-scheme: light)" content="#220F04" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#220F04">
  <meta name="msapplication-navbutton-color" content="#220F04">

  <!-- <link rel="icon" href="< ?php echo esc_url(get_field('favicon_customizado', 'option')); ?>" type="image/png"> -->

  <?php wp_head(); ?>

</head>