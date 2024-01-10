<?php

App::uses('PaginatorHelper','View/Helper');

class CustomPaginatorHelper extends PaginatorHelper {
    public function numbers($options = array()) {
		if ($options === true) {
			$options = array(
				'before' => ' | ', 'after' => ' | ', 'first' => 'first', 'last' => 'last'
			);
		}

		$defaults = array(
			'tag' => 'span', 'before' => null, 'after' => null, 'model' => $this->defaultModel(), 'class' => null,
			'modulus' => '8', 'separator' => ' | ', 'first' => null, 'last' => null, 'ellipsis' => '...',
			'currentClass' => 'current', 'currentTag' => null
		);
		$options += $defaults;

		$params = (array)$this->params($options['model']) + array('page' => 1);
		unset($options['model']);

		if (empty($params['pageCount']) || $params['pageCount'] <= 1) {
			return '';
		}

		extract($options);
		unset($options['tag'], $options['before'], $options['after'], $options['model'],
			$options['modulus'], $options['separator'], $options['first'], $options['last'],
			$options['ellipsis'], $options['class'], $options['currentClass'], $options['currentTag']
		);
		$out = '';
        $options['class'] = 'paginatorNumber';
		if ($modulus && $params['pageCount'] > $modulus) {
			$half = (int)($modulus / 2);
			$end = $params['page'] + $half;

			if ($end > $params['pageCount']) {
				$end = $params['pageCount'];
			}
			$start = $params['page'] - ($modulus - ($end - $params['page']));
			if ($start <= 1) {
				$start = 1;
				$end = $params['page'] + ($modulus - $params['page']) + 1;
			}

			$firstPage = is_int($first) ? $first : 0;
			if ($first && $start > 1) {
				$offset = ($start <= $firstPage) ? $start - 1 : $first;
				if ($firstPage < $start - 1) {
					$out .= $this->first($offset, compact('tag', 'separator', 'ellipsis', 'class'));
				} else {
					$out .= $this->first($offset, compact('tag', 'separator', 'class', 'ellipsis') + array('after' => $separator));
				}
			}

			$out .= $before;

			for ($i = $start; $i < $params['page']; $i++) {
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class')) . $separator;
			}

			if ($class) {
				$currentClass .= ' ' . $class;
			}
			if ($currentTag) {
				$out .= $this->Html->tag($tag, $this->Html->tag($currentTag, $params['page']), array('class' => $currentClass));
			} else {
				$out .= $this->Html->tag($tag, $params['page'], array('class' => $currentClass));
			}
			if ($i != $params['pageCount']) {
				$out .= $separator;
			}

			$start = $params['page'] + 1;
			for ($i = $start; $i < $end; $i++) {
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class')) . $separator;
			}

			if ($end != $params['page']) {
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $end), $options), compact('class'));
			}

			$out .= $after;

			if ($last && $end < $params['pageCount']) {
				$lastPage = is_int($last) ? $last : 0;
				$offset = ($params['pageCount'] < $end + $lastPage) ? $params['pageCount'] - $end : $last;
				if ($offset <= $lastPage && $params['pageCount'] - $end > $lastPage) {
					$out .= $this->last($offset, compact('tag', 'separator', 'ellipsis', 'class'));
				} else {
					$out .= $this->last($offset, compact('tag', 'separator', 'class', 'ellipsis') + array('before' => $separator));
				}
			}

		} else {
			$out .= $before;

			for ($i = 1; $i <= $params['pageCount']; $i++) {
				if ($i == $params['page']) {
					if ($class) {
						$currentClass .= ' ' . $class;
					}
					if ($currentTag) {
						$out .= $this->Html->tag($tag, $this->Html->tag($currentTag, $i), array('class' => $currentClass));
					} else {
						$out .= $this->Html->tag($tag, $i, array('class' => $currentClass));
					}
				} else {
					$out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class'));
				}
				if ($i != $params['pageCount']) {
					$out .= $separator;
				}
			}

			$out .= $after;
		}

		return $out;
	}

    public function next($title = 'Next >>', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$defaults = array(
			'rel' => 'next'
		);
		$options = (array)$options + $defaults;
		return $this->_pagingLink('Next', $title, $options, $disabledTitle, $disabledOptions);
	}

    public function hasPrev($model = null) {
		return $this->_hasPage($model, 'prev');
	}

    protected function _pagingLink($which, $title = null, $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$check = 'has' . $which;
		$_defaults = array(
			'url' => array(), 'step' => 1, 'escape' => true, 'model' => null,
			'tag' => 'span', 'class' => strtolower($which), 'disabledTag' => null
		);
		$options = (array)$options + $_defaults;
		$paging = $this->params($options['model']);
		if (empty($disabledOptions)) {
			$disabledOptions = $options;
		}

		if (!$this->{$check}($options['model']) && (!empty($disabledTitle) || !empty($disabledOptions))) {
			if (!empty($disabledTitle) && $disabledTitle !== true) {
				$title = $disabledTitle;
			}
			$options = (array)$disabledOptions + array_intersect_key($options, $_defaults) + $_defaults;
		} elseif (!$this->{$check}($options['model'])) {
			return '';
		}

		foreach (array_keys($_defaults) as $key) {
			${$key} = $options[$key];
			unset($options[$key]);
		}

		if ($this->{$check}($model)) {
			$url = array_merge(
				array('page' => $paging['page'] + ($which === 'Prev' ? $step * -1 : $step)),
				$url
			);
			if ($tag === false) {
				return $this->link(
					$title,
					$url,
					compact('escape', 'model', 'class') + $options
				);
			}
            
            $options['class'] = 'paginatorNumber';
			$link = $this->link($title, $url, compact('escape', 'model') + $options);
			return $this->Html->tag($tag, $link, compact('class'));
		}
		unset($options['rel']);
		if (!$tag) {
			if ($disabledTag) {
				$tag = $disabledTag;
				$disabledTag = null;
			} else {
				$tag = $_defaults['tag'];
			}
		}
		if ($disabledTag) {
			$title = $this->Html->tag($disabledTag, $title, compact('escape') + $options);
			return $this->Html->tag($tag, $title, compact('class'));
		}
		return $this->Html->tag($tag, $title, compact('escape', 'class') + $options);
	}
}
?>
