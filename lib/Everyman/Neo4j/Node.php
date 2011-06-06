<?php
namespace Everyman\Neo4j;

/**
 * Represents a single node in the database
 *
 * @todo: Paths
 */
class Node extends PropertyContainer
{
	/**
	 * Delete this node
	 *
	 * @return boolean
	 */
	public function delete()
	{
		return $this->client->deleteNode($this);
	}

	/**
	 * Get relationships of this node
	 *
	 * @param string $dir
	 * @param mixed  $types string or array of strings
	 * @return array of Relationship
	 */
	public function getRelationships($dir=null, $types=array())
	{
		return $this->client->getNodeRelationships($this, $dir, $types);
	}

	/**
	 * Load this node
	 *
	 * @return boolean
	 */
	public function load()
	{
		return $this->client->loadNode($this);
	}

	/**
	 * Make a new relationship
	 *
	 * @param Node $to
	 * @param string $type
	 * @return Relationship
	 */
	public function relateTo(Node $to, $type)
	{
		$rel = new Relationship($this->client);
		$rel->setStartNode($this);
		$rel->setEndNode($to);
		$rel->setType($type);

		return $rel;
	}

	/**
	 * Save this node
	 *
	 * @return boolean
	 */
	public function save()
	{
		return $this->client->saveNode($this);
	}
}