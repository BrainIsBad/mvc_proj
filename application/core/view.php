<?php

	class View
	{
		public function generate($content_view, $template_view, $title = 'Index', $data = null, $msg = null)
		{
			include 'application/views/' . $template_view;
		}
	}
